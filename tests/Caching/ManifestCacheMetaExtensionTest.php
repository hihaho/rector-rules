<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Caching;

use Hihaho\RectorRules\Caching\ManifestCacheMetaExtension;
use PHPUnit\Framework\TestCase;

final class ManifestCacheMetaExtensionTest extends TestCase
{
    private string $manifest;

    protected function setUp(): void
    {
        parent::setUp();

        $this->manifest = sys_get_temp_dir() . '/named-arg-manifest-' . bin2hex(random_bytes(8)) . '.json';
    }

    protected function tearDown(): void
    {
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

    public function test_key_is_stable(): void
    {
        $extension = new ManifestCacheMetaExtension($this->manifest);

        $this->assertSame('hihaho_named_argument_manifest', $extension->getKey());
    }
}
