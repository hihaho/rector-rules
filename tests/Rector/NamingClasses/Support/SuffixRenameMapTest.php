<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\Support;

use Hihaho\RectorRules\Rector\NamingClasses\Support\ClassDeclaration;
use Hihaho\RectorRules\Rector\NamingClasses\Support\SuffixRenameMap;
use InvalidArgumentException;
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

    private string $cacheDirectory = '';

    private string $originalCacheDirectory = '';

    protected function setUp(): void
    {
        parent::setUp();

        // Creating the container imports Rector's own config/config.php, which calls
        // paths([]). Any test configuring Option::PATHS has to do it after that, so force
        // the container into existence here rather than on the first make() in a test.
        self::getContainer();

        $this->directory = sys_get_temp_dir() . '/hihaho-suffix-rename-map-' . bin2hex(random_bytes(6));

        mkdir($this->directory, 0o777, true);

        // The scan caches its decisions under Rector's cache directory, which defaults to a
        // machine-global path shared with real runs. Point it somewhere disposable so tests
        // neither read each other's entries nor leave any behind.
        $this->originalCacheDirectory = SimpleParameterProvider::provideStringParameter(Option::CACHE_DIR, '');
        $this->cacheDirectory = $this->directory . '-cache';

        SimpleParameterProvider::setParameter(Option::CACHE_DIR, $this->cacheDirectory);
    }

    protected function tearDown(): void
    {
        $filePaths = glob($this->directory . '/*');

        foreach ($filePaths === false ? [] : $filePaths as $filePath) {
            unlink($filePath);
        }

        rmdir($this->directory);

        $cacheEntries = glob($this->cacheDirectory . '/hihaho-suffix-scan*/*');

        foreach ($cacheEntries === false ? [] : $cacheEntries as $cacheEntry) {
            unlink($cacheEntry);
        }

        $cacheSubdirectories = glob($this->cacheDirectory . '/hihaho-suffix-scan*', GLOB_ONLYDIR);

        foreach ($cacheSubdirectories === false ? [] : $cacheSubdirectories as $cacheSubdirectory) {
            rmdir($cacheSubdirectory);
        }

        if (is_dir($this->cacheDirectory)) {
            rmdir($this->cacheDirectory);
        }

        SimpleParameterProvider::setParameter(Option::CACHE_DIR, $this->originalCacheDirectory);
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
                static fn (ClassDeclaration $declaration): string => 'OrderShippedNotification',
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
                static fn (ClassDeclaration $declaration): string => 'OrderShippedListener',
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
                static fn (ClassDeclaration $declaration): string => 'OrderShippedEvent',
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
                static fn (ClassDeclaration $declaration): string => 'OrderShippedNotification',
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

    public function test_does_not_rewrite_references_to_a_class_whose_file_it_cannot_move(): void
    {
        // The scan refuses a rename it cannot finish, because half of it — the class
        // renamed, the file left behind — is the broken tree these rules exist to prevent.
        // The refusal has to reach the rename collector too, or every reference gets
        // rewritten to a name the declaration never took.
        $this->writeClass('OrderShipped.php', 'OrderShipped');

        $originalPaths = SimpleParameterProvider::provideArrayParameter(Option::PATHS);

        SimpleParameterProvider::setParameter(Option::PATHS, [$this->directory]);
        chmod($this->directory, 0o555);
        clearstatcache(true, $this->directory);

        try {
            if (is_writable($this->directory)) {
                self::markTestSkipped('Running as a user that can write to a read-only directory.');
            }

            $renamedClassesDataCollector = new RenamedClassesDataCollector();

            $this->makeMapWith($renamedClassesDataCollector)->register(
                'unwritable-test',
                static fn (ClassDeclaration $declaration): string => 'OrderShippedNotification',
                ['Notification'],
            );

            $this->assertSame([], $renamedClassesDataCollector->getOldToNewClasses());

            // Prove the setup was live rather than inert: the same corpus in a writable
            // directory does register the rename.
            chmod($this->directory, 0o777);
            clearstatcache(true, $this->directory);

            $writableCollector = new RenamedClassesDataCollector();

            $this->makeMapWith($writableCollector)->register(
                'writable-control',
                static fn (ClassDeclaration $declaration): string => 'OrderShippedNotification',
                ['Notification'],
            );

            $this->assertSame(
                ['App\\Notifications\\OrderShipped' => 'App\\Notifications\\OrderShippedNotification'],
                $writableCollector->getOldToNewClasses(),
            );
        } finally {
            chmod($this->directory, 0o777);
            clearstatcache(true, $this->directory);
            SimpleParameterProvider::setParameter(Option::PATHS, $originalPaths);
        }
    }

    public function test_a_cached_decision_is_replayed_on_an_unchanged_corpus(): void
    {
        $this->writeSettledClass('OrderShipped.php', 'OrderShipped');

        SimpleParameterProvider::setParameter(Option::PATHS, [$this->directory]);

        $resolver = static fn (ClassDeclaration $declaration): string => 'OrderShippedNotification';

        $this->makeMap()->register('replay-test', $resolver, ['Notification']);

        $entries = glob($this->cacheDirectory . '/hihaho-suffix-scan*/*.json');

        $this->assertNotFalse($entries);
        $this->assertNotSame([], $entries, 'nothing was cached, so there is no replay to test');

        // Rewriting the stored decision is the only way to tell a replay apart from a
        // second walk, which would produce the original name. The directory also holds the
        // per-file declaration entry, so pick the decisions one by its shape.
        $decisionsPath = null;

        foreach ($entries as $entry) {
            if (str_contains((string) file_get_contents($entry), '"accepted"')) {
                $decisionsPath = $entry;

                break;
            }
        }

        $this->assertNotNull($decisionsPath, 'no decisions entry was written');

        $stored = (string) file_get_contents($decisionsPath);
        file_put_contents($decisionsPath, str_replace('OrderShippedNotification', 'TamperedNotification', $stored));

        $collector = new RenamedClassesDataCollector();

        $this->makeMapWith($collector)->register('replay-test', $resolver, ['Notification']);

        $this->assertSame(
            ['App\\Notifications\\OrderShipped' => 'App\\Notifications\\TamperedNotification'],
            $collector->getOldToNewClasses(),
        );
    }

    public function test_a_replayed_decision_still_refuses_a_file_it_cannot_move(): void
    {
        // The guard lives on the replay path as well as the fresh one. `chmod` moves ctime,
        // not mtime, so the corpus digest is unchanged and the second run is a real hit.
        $this->writeSettledClass('OrderShipped.php', 'OrderShipped');

        SimpleParameterProvider::setParameter(Option::PATHS, [$this->directory]);

        $resolver = static fn (ClassDeclaration $declaration): string => 'OrderShippedNotification';

        $this->makeMap()->register('replay-unwritable-test', $resolver, ['Notification']);

        $entries = glob($this->cacheDirectory . '/hihaho-suffix-scan*/*.json');

        $this->assertNotFalse($entries);
        $this->assertNotSame([], $entries, 'nothing was cached, so there is no replay to test');

        chmod($this->directory, 0o555);
        clearstatcache(true, $this->directory);

        try {
            if (is_writable($this->directory)) {
                self::markTestSkipped('Running as a user that can write to a read-only directory.');
            }

            $collector = new RenamedClassesDataCollector();

            $this->makeMapWith($collector)->register('replay-unwritable-test', $resolver, ['Notification']);

            $this->assertSame([], $collector->getOldToNewClasses());
        } finally {
            chmod($this->directory, 0o777);
            clearstatcache(true, $this->directory);
        }
    }

    public function test_an_unchanged_file_is_reused_when_another_file_changes(): void
    {
        // The point of the per-file layer: editing one file must not re-read the rest. The
        // only way to observe that from outside is to plant something in a neighbour's
        // cached entry that a fresh parse would never produce, and see it honoured.
        $candidate = $this->writeSettledClass('OrderShipped.php', 'OrderShipped');
        $this->writeSettledClass('Neighbour.php', 'Neighbour');

        SimpleParameterProvider::setParameter(Option::PATHS, [$this->directory]);

        $resolver = static fn (ClassDeclaration $declaration): ?string => $declaration->shortName === 'OrderShipped'
            ? 'OrderShippedNotification'
            : null;

        $this->makeMap()->register('reuse-test', $resolver, ['Notification']);

        $declarationsPath = $this->declarationsEntryPath();
        $stored = json_decode((string) file_get_contents($declarationsPath), true);
        $this->assertIsArray($stored);

        // Neighbour.php now claims to declare the name the rename wants.
        $neighbourPath = $this->directory . '/Neighbour.php';
        $this->assertArrayHasKey($neighbourPath, $stored);
        $this->assertIsArray($stored[$neighbourPath]);
        $stored[$neighbourPath]['names'] = ['App\\Notifications\\OrderShippedNotification'];
        file_put_contents($declarationsPath, (string) json_encode($stored));

        // Change only the candidate file, so its entry is stale and Neighbour's is not.
        file_put_contents($candidate, file_get_contents($candidate) . "\n// touched\n");
        touch($candidate, time() - 4);
        clearstatcache();

        $collector = new RenamedClassesDataCollector();
        $this->makeMapWith($collector)->register('reuse-test', $resolver, ['Notification']);

        // Neighbour was not re-read, so its planted declaration stands and collides.
        $this->assertSame([], $collector->getOldToNewClasses());
    }

    public function test_an_edited_file_is_re_read_rather_than_replayed(): void
    {
        $candidate = $this->writeSettledClass('OrderShipped.php', 'OrderShipped');

        SimpleParameterProvider::setParameter(Option::PATHS, [$this->directory]);

        $resolver = static fn (ClassDeclaration $declaration): ?string => $declaration->shortName === 'OrderShipped'
            ? 'OrderShippedNotification'
            : null;

        $firstCollector = new RenamedClassesDataCollector();
        $this->makeMapWith($firstCollector)->register('edit-test', $resolver, ['Notification']);
        $this->assertNotSame([], $firstCollector->getOldToNewClasses());

        // Rename the class on disk. A replayed entry would still claim OrderShipped.
        file_put_contents(
            $candidate,
            str_replace('class OrderShipped', 'class SomethingElse', (string) file_get_contents($candidate))
        );
        touch($candidate, time() - 4);
        clearstatcache();

        $secondCollector = new RenamedClassesDataCollector();
        $this->makeMapWith($secondCollector)->register('edit-test', $resolver, ['Notification']);

        $this->assertSame([], $secondCollector->getOldToNewClasses());
    }

    public function test_a_deleted_file_does_not_linger_in_the_index(): void
    {
        $this->writeSettledClass('OrderShipped.php', 'OrderShipped');
        $goingAway = $this->writeSettledClass('GoingAway.php', 'GoingAway');

        SimpleParameterProvider::setParameter(Option::PATHS, [$this->directory]);

        $resolver = static fn (ClassDeclaration $declaration): ?string => null;

        $this->makeMap()->register('prune-test', $resolver, ['Notification']);

        unlink($goingAway);
        clearstatcache();

        $this->makeMap()->register('prune-test', $resolver, ['Notification']);

        $stored = json_decode((string) file_get_contents($this->declarationsEntryPath()), true);
        $this->assertIsArray($stored);
        $this->assertArrayNotHasKey($goingAway, $stored);
    }

    public function test_the_per_file_entry_stores_syntax_and_never_a_candidate_verdict(): void
    {
        // Whether a class is a candidate depends on reflection over its parent, which spans
        // files and installed packages. Caching that verdict per file is the unsound design
        // this layer exists to avoid, so the stored shape is pinned here.
        $this->writeSettledClass('OrderShipped.php', 'OrderShipped');

        SimpleParameterProvider::setParameter(Option::PATHS, [$this->directory]);

        $this->makeMap()->register(
            'shape-test',
            static fn (ClassDeclaration $declaration): ?string => null,
            ['Notification'],
        );

        $stored = json_decode((string) file_get_contents($this->declarationsEntryPath()), true);
        $this->assertIsArray($stored);

        $entry = $stored[$this->directory . '/OrderShipped.php'] ?? null;
        $this->assertIsArray($entry);
        $this->assertSame(['digest', 'names', 'classes'], array_keys($entry));
        $this->assertIsArray($entry['classes']);

        foreach ($entry['classes'] as $class) {
            $this->assertIsArray($class);
            $this->assertSame(['fqcn', 'shortName', 'parentFqcn', 'isAbstract'], array_keys($class));
        }
    }

    public function test_an_unreadable_file_is_not_cached_as_declaring_nothing(): void
    {
        // The end-to-end shape of the same hazard: a file the scan could not open must not
        // be remembered as empty, or it drops out of collision detection for good.
        $this->writeSettledClass('OrderShipped.php', 'OrderShipped');
        $unreadable = $this->writeSettledClass('Taken.php', 'OrderShippedNotification');

        SimpleParameterProvider::setParameter(Option::PATHS, [$this->directory]);

        chmod($unreadable, 0o000);
        clearstatcache(true, $unreadable);

        try {
            if (is_readable($unreadable)) {
                self::markTestSkipped('Running as a user that can read a mode-000 file.');
            }

            $this->makeMap()->register(
                'unreadable-test',
                static fn (ClassDeclaration $declaration): ?string => $declaration->shortName === 'OrderShipped'
                    ? 'OrderShippedNotification'
                    : null,
                ['Notification'],
            );

            $stored = json_decode((string) file_get_contents($this->declarationsEntryPath()), true);
            $this->assertIsArray($stored);
            $this->assertArrayNotHasKey($unreadable, $stored);
        } finally {
            chmod($unreadable, 0o644);
            clearstatcache(true, $unreadable);
        }
    }

    /**
     * The cache directory holds both the decisions entry and the per-file declarations
     * entry; only the latter is keyed by file path.
     */
    private function declarationsEntryPath(): string
    {
        $entries = glob($this->cacheDirectory . '/hihaho-suffix-scan*/*.json');

        $this->assertNotFalse($entries);

        foreach ($entries as $entry) {
            if (! str_contains((string) file_get_contents($entry), '"accepted"')) {
                return $entry;
            }
        }

        self::fail('no per-file declarations entry was written');
    }

    private function makeMap(): SuffixRenameMap
    {
        return $this->makeMapWith(new RenamedClassesDataCollector());
    }

    private function makeMapWith(RenamedClassesDataCollector $renamedClassesDataCollector): SuffixRenameMap
    {
        return new SuffixRenameMap($renamedClassesDataCollector, $this->make(Skipper::class));
    }

    /**
     * A corpus file the scan is willing to cache: its mtime has to be strictly in the past,
     * or `CorpusFiles::isSettled()` refuses to store a digest of it.
     */
    private function writeSettledClass(string $fileName, string $className): string
    {
        $path = $this->writeClass($fileName, $className);

        touch($path, time() - 5);
        clearstatcache(true, $path);

        return $path;
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
