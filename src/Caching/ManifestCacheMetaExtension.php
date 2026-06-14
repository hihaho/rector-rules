<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Caching;

use Rector\Caching\Contract\CacheMetaExtensionInterface;

/**
 * Folds the manifest's content into Rector's per-file cache key, so
 * {@see \Hihaho\RectorRules\Rector\CodeQuality\NamedArgumentFromManifestRector}
 * stays cache-correct.
 *
 * Rector keys each file's cache on the source content, the configuration
 * *parameters*, and any registered cache-meta extensions — but **not** a rule's
 * configuration array, and never the content of a file that array points at. So
 * a regenerated manifest with new findings, over unchanged source, would be
 * served from cache and silently skipped. Registering this extension makes the
 * manifest's hash part of every file's key: when the manifest content changes,
 * Rector reprocesses; while it is stable, the cache keeps working.
 *
 * Register it alongside the rule, sharing the same manifest path. Bind the
 * instance yourself (so it receives the path) and tag it — do *not* use
 * `RectorConfig::cacheMetaExtension()`, which re-binds the class to the
 * container's autowiring and drops the constructor argument:
 *
 * ```php
 * use Rector\Caching\Contract\CacheMetaExtensionInterface;
 *
 * $manifest = __DIR__ . '/named-arguments-manifest.json';
 * $rectorConfig->ruleWithConfiguration(NamedArgumentFromManifestRector::class, [
 *     NamedArgumentFromManifestRector::MANIFEST => $manifest,
 * ]);
 * $rectorConfig->singleton(ManifestCacheMetaExtension::class, fn () => new ManifestCacheMetaExtension($manifest));
 * $rectorConfig->tag(ManifestCacheMetaExtension::class, CacheMetaExtensionInterface::class);
 * ```
 *
 * The simpler alternative — if you would rather not wire anything — is to run
 * the manifest pass with `rector process --no-cache`.
 *
 * @see \Hihaho\RectorRules\Tests\Caching\ManifestCacheMetaExtensionTest
 */
final readonly class ManifestCacheMetaExtension implements CacheMetaExtensionInterface
{
    public function __construct(
        private string $manifestPath,
    ) {}

    public function getKey(): string
    {
        return 'hihaho_named_argument_manifest';
    }

    public function getHash(): string
    {
        if (! is_file($this->manifestPath)) {
            return 'manifest-missing';
        }

        return (string) hash_file('sha256', $this->manifestPath);
    }
}
