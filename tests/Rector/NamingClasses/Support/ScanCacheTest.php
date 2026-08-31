<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\Support;

use Hihaho\RectorRules\Rector\NamingClasses\Support\ScanCache;
use Rector\Testing\PHPUnit\AbstractLazyTestCase;

/**
 * The cache decides whether a run trusts a previous scan instead of doing its own, so what
 * matters is that every way of being wrong comes out as a miss.
 */
final class ScanCacheTest extends AbstractLazyTestCase
{
    private string $directory = '';

    protected function setUp(): void
    {
        parent::setUp();

        $this->directory = sys_get_temp_dir() . '/hihaho-scan-cache-' . bin2hex(random_bytes(6));
    }

    protected function tearDown(): void
    {
        $filePaths = glob($this->directory . '/*');

        foreach ($filePaths === false ? [] : $filePaths as $filePath) {
            unlink($filePath);
        }

        if (is_dir($this->directory)) {
            rmdir($this->directory);
        }

        parent::tearDown();
    }

    public function test_reads_back_what_it_stored(): void
    {
        $decisions = [
            'accepted' => [[
                'oldFqcn' => 'App\Notifications\OrderShipped',
                'newFqcn' => 'App\Notifications\OrderShippedNotification',
                'newShortName' => 'OrderShippedNotification',
                'oldShortName' => 'OrderShipped',
                'path' => '/app/Notifications/OrderShipped.php',
                'isOnlyClassInFile' => true,
            ]],
            'declined' => ['App\Notifications\InvoicePaid'],
        ];

        $scanCache = new ScanCache($this->directory);
        $scanCache->store('some-key', $decisions);

        $this->assertSame($decisions, $scanCache->load('some-key'));
    }

    public function test_a_key_that_was_never_stored_is_a_miss(): void
    {
        $this->assertNull((new ScanCache($this->directory))->load('never-written'));
    }

    public function test_a_different_key_does_not_read_another_entry(): void
    {
        $scanCache = new ScanCache($this->directory);
        $scanCache->store('one-corpus', ['accepted' => [], 'declined' => ['App\Gone']]);

        $this->assertNull($scanCache->load('another-corpus'));
    }

    public function test_a_truncated_entry_is_a_miss_rather_than_an_error(): void
    {
        $scanCache = new ScanCache($this->directory);
        $scanCache->store('half-written', ['accepted' => [], 'declined' => []]);

        $entries = glob($this->directory . '/*.json');
        $this->assertNotFalse($entries);
        $this->assertCount(1, $entries);

        file_put_contents($entries[0], '{"accepted":[],"decli');

        $this->assertNull($scanCache->load('half-written'));
    }

    public function test_an_entry_of_the_wrong_shape_is_a_miss(): void
    {
        $scanCache = new ScanCache($this->directory);
        $scanCache->store('foreign', ['accepted' => [], 'declined' => []]);

        $entries = glob($this->directory . '/*.json');
        $this->assertNotFalse($entries);

        // Valid JSON, but not decisions this code wrote — a rename with no destination.
        file_put_contents($entries[0], '{"accepted":[{"oldFqcn":"App\\\\Foo"}],"declined":[]}');

        $this->assertNull($scanCache->load('foreign'));
    }

    public function test_a_declined_list_holding_something_other_than_class_names_is_a_miss(): void
    {
        $scanCache = new ScanCache($this->directory);
        $scanCache->store('bad-declined', ['accepted' => [], 'declined' => []]);

        $entries = glob($this->directory . '/*.json');
        $this->assertNotFalse($entries);

        file_put_contents($entries[0], '{"accepted":[],"declined":[42]}');

        $this->assertNull($scanCache->load('bad-declined'));
    }

    public function test_storing_into_a_directory_it_cannot_create_is_silent(): void
    {
        // A read-only cache directory must cost a scan, never a crash mid-run.
        $unwritable = $this->directory . '/nested';

        mkdir($this->directory, 0o555, true);
        clearstatcache(true, $this->directory);

        if (is_writable($this->directory)) {
            self::markTestSkipped('Running as a user that can write to a read-only directory.');
        }

        $scanCache = new ScanCache($unwritable);
        $scanCache->store('anything', ['accepted' => [], 'declined' => []]);

        $this->assertNull($scanCache->load('anything'));

        chmod($this->directory, 0o777);
        clearstatcache(true, $this->directory);
    }
}
