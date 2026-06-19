<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Caching;

use Hihaho\RectorRules\Caching\ManifestCacheMetaExtension;
use InvalidArgumentException;
use Rector\Testing\PHPUnit\AbstractLazyTestCase;

/**
 * Extends Rector's own lazy test base (not a bare PHPUnit TestCase): its setUp
 * pulls in Rector's scoper autoload, so loading a class that implements a Rector
 * contract here doesn't double-declare Rector's bundled symfony polyfill against
 * the root one — a redeclaration fatal that only surfaces on the Windows
 * prefer-lowest CI leg. Every other test in this suite runs through this base.
 */
final class ManifestCacheMetaExtensionTest extends AbstractLazyTestCase
{
    private string $manifest;

    protected function setUp(): void
    {
        parent::setUp();

        $this->manifest = sys_get_temp_dir() . '/named-arg-manifest-' . bin2hex(random_bytes(8)) . '.json';
    }

    protected function tearDown(): void
    {
        // Restore read perms first — the unreadable-manifest test chmods to 0000,
        // and a 0000 file can resist unlink on some filesystems.
        @chmod($this->manifest, 0644);

        if (is_file($this->manifest)) {
            unlink($this->manifest);
        }

        parent::tearDown();
    }

    public function test_hash_changes_when_manifest_content_changes(): void
    {
        file_put_contents($this->manifest, '[]');
        $extension = new ManifestCacheMetaExtension($this->manifest);

        $empty = $extension->getHash();

        file_put_contents($this->manifest, '[{"file":"a.php","line":5,"method":"m","argIndex":1,"paramName":"p"}]');
        $populated = $extension->getHash();

        $this->assertNotSame($empty, $populated);
    }

    public function test_hash_is_stable_for_unchanged_content(): void
    {
        file_put_contents($this->manifest, '[{"file":"a.php","line":5,"method":"m","argIndex":1,"paramName":"p"}]');
        $extension = new ManifestCacheMetaExtension($this->manifest);

        $this->assertSame($extension->getHash(), $extension->getHash());
    }

    public function test_hash_signals_a_missing_manifest(): void
    {
        $extension = new ManifestCacheMetaExtension($this->manifest);

        $this->assertSame('manifest-missing', $extension->getHash());
    }

    public function test_hash_signals_an_unreadable_manifest(): void
    {
        file_put_contents($this->manifest, '[{"file":"a.php","line":5,"method":"m","argIndex":1,"paramName":"p"}]');
        chmod($this->manifest, 0000);

        // Root and filesystems/OSes that ignore mode bits (Windows) still read a
        // 0000 file — the unreadable branch is unobservable there, so skip.
        if (is_readable($this->manifest)) {
            self::markTestSkipped('Filesystem ignores 0000 mode; cannot exercise the unreadable branch.');
        }

        $extension = new ManifestCacheMetaExtension($this->manifest);

        $this->assertSame('manifest-unreadable', $extension->getHash());
    }

    public function test_key_is_stable(): void
    {
        $extension = new ManifestCacheMetaExtension($this->manifest);

        $this->assertSame('hihaho_named_argument_manifest', $extension->getKey());
    }

    public function test_one_instance_tracks_several_manifests(): void
    {
        // The cache-meta key is constant, so multiple manifest-driven rules must share
        // one instance (a second registration would collide). That instance folds every
        // manifest's hash together: changing any one must change the combined hash.
        $second = sys_get_temp_dir() . '/test-field-manifest-' . bin2hex(random_bytes(8)) . '.json';

        try {
            file_put_contents($this->manifest, '[]');
            file_put_contents($second, '[]');
            $extension = new ManifestCacheMetaExtension($this->manifest, $second);

            $before = $extension->getHash();

            file_put_contents($second, '[{"file":"a.php","line":5,"value":"id","constFqcn":"App\\\\Models\\\\Order::ID"}]');
            $after = $extension->getHash();

            $this->assertNotSame($before, $after);
        } finally {
            if (is_file($second)) {
                unlink($second);
            }
        }
    }

    public function test_construction_without_a_manifest_path_fails_loudly(): void
    {
        // Guards the documented misconfiguration: autowiring / cacheMetaExtension()
        // drop the constructor argument, and a silent empty instance would disable
        // cache invalidation instead of erroring.
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('needs at least one manifest path');

        new ManifestCacheMetaExtension();
    }

    public function test_path_order_does_not_affect_the_combined_hash(): void
    {
        $second = sys_get_temp_dir() . '/test-field-manifest-' . bin2hex(random_bytes(8)) . '.json';

        try {
            file_put_contents($this->manifest, '[{"file":"a.php","line":1,"value":"id","constFqcn":"App\\\\Models\\\\Order::ID"}]');
            file_put_contents($second, '[{"file":"b.php","line":2,"value":"id","constFqcn":"App\\\\Models\\\\Order::ID"}]');

            $oneWay = (new ManifestCacheMetaExtension($this->manifest, $second))->getHash();
            $other = (new ManifestCacheMetaExtension($second, $this->manifest))->getHash();

            $this->assertSame($oneWay, $other);
        } finally {
            if (is_file($second)) {
                unlink($second);
            }
        }
    }
}
