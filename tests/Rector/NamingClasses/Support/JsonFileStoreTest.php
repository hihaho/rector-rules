<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\Support;

use Hihaho\RectorRules\Rector\NamingClasses\Support\JsonFileStore;
use Rector\Testing\PHPUnit\AbstractLazyTestCase;

/**
 * Parallel workers read these entries while another process writes them, so the only
 * acceptable outcomes are the whole previous value, the whole new one, or nothing.
 */
final class JsonFileStoreTest extends AbstractLazyTestCase
{
    private string $directory = '';

    protected function setUp(): void
    {
        parent::setUp();

        $this->directory = sys_get_temp_dir() . '/hihaho-json-store-' . bin2hex(random_bytes(6));
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

    public function test_reads_back_what_it_wrote(): void
    {
        $store = new JsonFileStore($this->directory);
        $store->write('a-key', ['some' => ['nested' => 1], 'list' => [1, 2, 3]]);

        $this->assertSame(['some' => ['nested' => 1], 'list' => [1, 2, 3]], $store->read('a-key'));
    }

    public function test_creates_its_directory_privately(): void
    {
        if ($this->isWindows()) {
            self::markTestSkipped('POSIX directory modes do not apply on Windows.');
        }

        // The default cache root is a shared, predictable path in the system temp dir.
        $store = new JsonFileStore($this->directory);
        $store->write('a-key', []);

        $this->assertDirectoryExists($this->directory);

        $permissions = fileperms($this->directory);
        $this->assertNotFalse($permissions);
        $this->assertSame('0700', substr(sprintf('%o', $permissions), -4));
    }

    public function test_an_unwritten_key_is_a_miss(): void
    {
        $this->assertNull((new JsonFileStore($this->directory))->read('never-written'));
    }

    public function test_keys_do_not_collide(): void
    {
        $store = new JsonFileStore($this->directory);
        $store->write('one', ['value' => 1]);
        $store->write('two', ['value' => 2]);

        $this->assertSame(['value' => 1], $store->read('one'));
        $this->assertSame(['value' => 2], $store->read('two'));
    }

    public function test_a_truncated_file_is_a_miss(): void
    {
        $store = new JsonFileStore($this->directory);
        $store->write('a-key', ['value' => 1]);

        $entries = glob($this->directory . '/*.json');
        $this->assertNotFalse($entries);
        $this->assertCount(1, $entries);

        file_put_contents($entries[0], '{"value":');

        $this->assertNull($store->read('a-key'));
    }

    public function test_a_scalar_payload_on_disk_is_a_miss(): void
    {
        $store = new JsonFileStore($this->directory);
        $store->write('a-key', ['value' => 1]);

        $entries = glob($this->directory . '/*.json');
        $this->assertNotFalse($entries);

        file_put_contents($entries[0], '"just a string"');

        $this->assertNull($store->read('a-key'));
    }

    public function test_leaves_no_temporary_file_behind(): void
    {
        // A worker must never read a half-written entry, so writes land beside the
        // destination and are moved into place.
        $store = new JsonFileStore($this->directory);
        $store->write('a-key', ['value' => 1]);

        $leftovers = glob($this->directory . '/*.tmp');

        $this->assertNotFalse($leftovers);
        $this->assertSame([], $leftovers);
    }

    public function test_a_directory_it_cannot_create_is_silent(): void
    {
        if ($this->isWindows()) {
            self::markTestSkipped('A read-only directory mode does not stop writes on Windows.');
        }

        $unwritable = $this->directory . '/nested';

        mkdir($this->directory, 0o555, true);
        clearstatcache(true, $this->directory);

        if (is_writable($this->directory)) {
            self::markTestSkipped('Running as a user that can write to a read-only directory.');
        }

        $store = new JsonFileStore($unwritable);
        $store->write('a-key', ['value' => 1]);

        $this->assertNull($store->read('a-key'));

        chmod($this->directory, 0o777);
        clearstatcache(true, $this->directory);
    }
}
