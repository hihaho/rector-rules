<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\Support;

use Hihaho\RectorRules\Rector\NamingClasses\Support\SuffixRenameMap;
use InvalidArgumentException;
use PhpParser\Node\Stmt\Class_;
use Rector\Configuration\Option;
use Rector\Configuration\Parameter\SimpleParameterProvider;
use Rector\Configuration\RenamedClassesDataCollector;
use Rector\Skipper\Skipper\Skipper;
use Rector\Testing\PHPUnit\AbstractLazyTestCase;

/**
 * Focused coverage for the file-rename guards. These are what make `--dry-run` a
 * no-op and what stops the rename from clobbering an unrelated file, so they are
 * worth pinning without booting a whole Rector container.
 */
final class SuffixRenameMapTest extends AbstractLazyTestCase
{
    private string $directory = '';

    protected function setUp(): void
    {
        parent::setUp();

        $this->directory = sys_get_temp_dir() . '/hihaho-suffix-rename-map-' . bin2hex(random_bytes(6));

        mkdir($this->directory, 0o777, true);
    }

    protected function tearDown(): void
    {
        $filePaths = glob($this->directory . '/*');

        foreach ($filePaths === false ? [] : $filePaths as $filePath) {
            unlink($filePath);
        }

        rmdir($this->directory);
    }

    public function test_renames_the_file_once_the_new_class_name_is_on_disk(): void
    {
        $path = $this->writeClass('OrderShipped.php', 'OrderShipped');

        $map = $this->makeMap();

        $this->assertTrue($map->claim('App\Notifications\OrderShipped', 'OrderShippedNotification', $path));

        // Stand in for Rector having written the rename to disk.
        $this->writeClass('OrderShipped.php', 'OrderShippedNotification');

        $map->flushFileRenames();

        $this->assertFileExists($this->directory . '/OrderShippedNotification.php');
        $this->assertFileDoesNotExist($path);
    }

    public function test_leaves_the_file_alone_when_nothing_was_written(): void
    {
        // This is the dry-run shape: the rename was claimed, but Rector printed no
        // changes, so the file on disk still declares the old name.
        $path = $this->writeClass('InvoicePaid.php', 'InvoicePaid');

        $map = $this->makeMap();
        $map->claim('App\Notifications\InvoicePaid', 'InvoicePaidNotification', $path);

        $map->flushFileRenames();

        $this->assertFileExists($path);
        $this->assertFileDoesNotExist($this->directory . '/InvoicePaidNotification.php');
    }

    public function test_declines_a_rename_whose_destination_file_already_exists(): void
    {
        $path = $this->writeClass('ReceiptSent.php', 'ReceiptSent');
        $this->writeClass('ReceiptSentNotification.php', 'ReceiptSentNotification');

        $map = $this->makeMap();

        $this->assertFalse($map->claim('App\Notifications\ReceiptSent', 'ReceiptSentNotification', $path));
        $this->assertFileExists($path);
    }

    public function test_does_not_register_a_declined_rename_with_the_collector(): void
    {
        $path = $this->writeClass('ReceiptSent.php', 'ReceiptSent');
        $this->writeClass('ReceiptSentNotification.php', 'ReceiptSentNotification');

        $renamedClassesDataCollector = new RenamedClassesDataCollector();

        $map = $this->makeMapWith($renamedClassesDataCollector);
        $map->claim('App\Notifications\ReceiptSent', 'ReceiptSentNotification', $path);

        $this->assertSame([], $renamedClassesDataCollector->getOldToNewClasses());
    }

    public function test_registers_a_cleared_rename_with_the_collector(): void
    {
        $path = $this->writeClass('OrderShipped.php', 'OrderShipped');

        $renamedClassesDataCollector = new RenamedClassesDataCollector();

        $map = $this->makeMapWith($renamedClassesDataCollector);
        $map->claim('App\Notifications\OrderShipped', 'OrderShippedNotification', $path);

        $this->assertSame(
            ['App\Notifications\OrderShipped' => 'App\Notifications\OrderShippedNotification'],
            $renamedClassesDataCollector->getOldToNewClasses(),
        );
    }

    public function test_the_scan_ignores_a_file_the_consumer_skipped(): void
    {
        // A skipped declaration is never processed, so registering its rename would leave
        // every reference pointing at a class that was never renamed.
        $this->writeClass('OrderShipped.php', 'OrderShipped');

        $originalSkip = SimpleParameterProvider::provideArrayParameter(Option::SKIP);
        $originalPaths = SimpleParameterProvider::provideArrayParameter(Option::PATHS);

        SimpleParameterProvider::setParameter(Option::SKIP, [$this->directory . '/*']);
        SimpleParameterProvider::setParameter(Option::PATHS, [$this->directory]);

        try {
            // Rector's SkippedPathsResolver memoises its paths on first use and only
            // re-resolves under a PHPUnit runner it recognises. Running under Pest, an
            // earlier test class can win that race, and no public API clears it — so
            // confirm the skip is actually live before asserting on it.
            if (! $this->make(Skipper::class)->shouldSkipFilePath($this->directory . '/OrderShipped.php')) {
                self::markTestSkipped("Rector's skipped-path cache was populated before this test could configure a skip.");
            }

            $renamedClassesDataCollector = new RenamedClassesDataCollector();

            $this->makeMapWith($renamedClassesDataCollector)->register(
                'skip-test',
                static fn (Class_ $class): string => 'OrderShippedNotification',
                ['Notification'],
            );

            $this->assertSame([], $renamedClassesDataCollector->getOldToNewClasses());
        } finally {
            SimpleParameterProvider::setParameter(Option::SKIP, $originalSkip);
            SimpleParameterProvider::setParameter(Option::PATHS, $originalPaths);
        }
    }

    public function test_refuses_a_second_rename_of_the_same_class_to_a_different_name(): void
    {
        // Two rules claiming one class for different targets would leave the declaration,
        // the references and the file move disagreeing.
        $path = $this->writeClass('OrderShipped.php', 'OrderShipped');

        $map = $this->makeMap();

        $this->assertTrue($map->claim('App\Notifications\OrderShipped', 'OrderShippedNotification', $path));
        $this->assertFalse($map->claim('App\Notifications\OrderShipped', 'OrderShippedEvent', $path));

        // The first claim still stands.
        $this->assertTrue($map->claim('App\Notifications\OrderShipped', 'OrderShippedNotification', $path));
    }

    public function test_a_rule_outside_this_package_can_bring_its_own_destination_suffix(): void
    {
        // `AbstractAddSuffixRector` is extensible, so a consumer's own suffix rule must
        // work. The scan skips files by looking for destination substrings, so registering
        // widens what it looks for rather than rejecting the unknown one.
        $this->writeClass('OrderShipped.php', 'OrderShipped');

        $originalPaths = SimpleParameterProvider::provideArrayParameter(Option::PATHS);

        SimpleParameterProvider::setParameter(Option::PATHS, [$this->directory]);

        try {
            $renamedClassesDataCollector = new RenamedClassesDataCollector();

            $this->makeMapWith($renamedClassesDataCollector)->register(
                'consumer-suffix-test',
                static fn (Class_ $class): string => 'OrderShippedListener',
                ['Listener'],
            );

            $this->assertSame(
                ['App\Notifications\OrderShipped' => 'App\Notifications\OrderShippedListener'],
                $renamedClassesDataCollector->getOldToNewClasses(),
            );
        } finally {
            SimpleParameterProvider::setParameter(Option::PATHS, $originalPaths);
        }
    }

    public function test_a_rule_cannot_rename_to_a_name_outside_the_suffixes_it_declared(): void
    {
        $this->writeClass('OrderShipped.php', 'OrderShipped');

        $originalPaths = SimpleParameterProvider::provideArrayParameter(Option::PATHS);

        SimpleParameterProvider::setParameter(Option::PATHS, [$this->directory]);

        try {
            $this->expectException(InvalidArgumentException::class);
            $this->expectExceptionMessage('contains none of the destination substrings it declared');

            $this->makeMap()->register(
                'undeclared-destination-test',
                static fn (Class_ $class): string => 'OrderShippedEvent',
                ['Notification'],
            );
        } finally {
            SimpleParameterProvider::setParameter(Option::PATHS, $originalPaths);
        }
    }

    public function test_an_anonymous_class_in_a_method_body_does_not_block_the_file_rename(): void
    {
        // The "more than one class in this file" guard exists for PSR-4: renaming the file
        // would strand the classes that were not renamed. An anonymous class has no name
        // and no PSR-4 path, so it is not one of those.
        $path = $this->directory . '/OrderShipped.php';

        $withAnonymousClass = static fn (string $className): string => <<<PHP
            <?php

            namespace App\Notifications;

            class {$className}
            {
                public function via(): object
                {
                    return new class {};
                }
            }

            PHP;

        file_put_contents($path, $withAnonymousClass('OrderShipped'));

        $originalPaths = SimpleParameterProvider::provideArrayParameter(Option::PATHS);

        SimpleParameterProvider::setParameter(Option::PATHS, [$this->directory]);

        try {
            $map = $this->makeMap();

            $map->register(
                'anonymous-class-test',
                static fn (Class_ $class): string => 'OrderShippedNotification',
                ['Notification'],
            );

            // Stand in for Rector having written the rename to disk.
            file_put_contents($path, $withAnonymousClass('OrderShippedNotification'));

            $map->flushFileRenames();

            $this->assertFileExists($this->directory . '/OrderShippedNotification.php');
            $this->assertFileDoesNotExist($path);
        } finally {
            SimpleParameterProvider::setParameter(Option::PATHS, $originalPaths);

            $stragglers = glob($this->directory . '/*');

            foreach ($stragglers === false ? [] : $stragglers as $straggler) {
                unlink($straggler);
            }
        }
    }

    private function makeMap(): SuffixRenameMap
    {
        return $this->makeMapWith(new RenamedClassesDataCollector());
    }

    private function makeMapWith(RenamedClassesDataCollector $renamedClassesDataCollector): SuffixRenameMap
    {
        return new SuffixRenameMap($renamedClassesDataCollector, $this->make(Skipper::class));
    }

    private function writeClass(string $fileName, string $className): string
    {
        $path = $this->directory . '/' . $fileName;

        file_put_contents($path, <<<PHP
            <?php

            namespace App\Notifications;

            class {$className}
            {
            }

            PHP);

        return $path;
    }
}
