<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Caching;

use InvalidArgumentException;
use Rector\Caching\Contract\CacheMetaExtensionInterface;

/**
 * Folds manifest content into Rector's per-file cache key, so a manifest-driven
 * rule ({@see \Hihaho\RectorRules\Rector\CodeQuality\NamedArgumentFromManifestRector},
 * {@see \Hihaho\RectorRules\Rector\Testing\TestFieldStringToConstantRector}) stays
 * cache-correct.
 *
 * Rector keys each file's cache on the source content, the configuration
 * *parameters*, and any registered cache-meta extensions — but **not** a rule's
 * configuration array, and never the content of a file that array points at. So
 * a regenerated manifest with new findings, over unchanged source, would be
 * served from cache and silently skipped. Registering this extension makes the
 * manifest's hash part of every file's key: when the manifest content changes,
 * Rector reprocesses; while it is stable, the cache keeps working.
 *
 * **Pass every manifest path to one instance.** A cache-meta extension is keyed by
 * a single {@see getKey()}, so registering two instances of this class would have
 * the second collide with (and overwrite) the first — and the `singleton()` wiring
 * below binds by class name, so only one instance exists anyway. When more than one
 * manifest-driven rule is enabled, give this one instance *all* their manifest
 * paths; {@see getHash()} folds them together, so changing any one reprocesses.
 *
 * Bind the instance yourself (so it receives the paths) and tag it — do *not* use
 * `RectorConfig::cacheMetaExtension()`, which re-binds the class to the container's
 * autowiring and drops the constructor argument:
 *
 * ```php
 * use Rector\Caching\Contract\CacheMetaExtensionInterface;
 *
 * $namedArgs = __DIR__ . '/named-arguments-manifest.json';
 * $testFields = __DIR__ . '/test-field-manifest.json';
 * $rectorConfig->ruleWithConfiguration(NamedArgumentFromManifestRector::class, [
 *     NamedArgumentFromManifestRector::MANIFEST => $namedArgs,
 * ]);
 * $rectorConfig->ruleWithConfiguration(TestFieldStringToConstantRector::class, [
 *     TestFieldStringToConstantRector::MANIFEST => $testFields,
 * ]);
 * // one extension, every manifest path:
 * $rectorConfig->singleton(ManifestCacheMetaExtension::class, fn () => new ManifestCacheMetaExtension($namedArgs, $testFields));
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
    /** @var list<string> */
    private array $manifestPaths;

    public function __construct(string ...$manifestPaths)
    {
        // Fail loud on zero paths. The variadic accepts none, but an empty instance
        // would hash to a constant and silently stop invalidating the cache — exactly
        // the failure mode the "bind it yourself" caveat guards against, since
        // autowiring / cacheMetaExtension() construct with no arguments.
        if ($manifestPaths === []) {
            throw new InvalidArgumentException(
                self::class . ' needs at least one manifest path. Bind and tag the instance yourself with the path(s); do not rely on autowiring or RectorConfig::cacheMetaExtension(), which drop the constructor argument.',
            );
        }

        // Sort so the combined hash is order-independent — a consumer reordering the
        // paths in their config must not trigger a spurious full reprocess.
        sort($manifestPaths);

        $this->manifestPaths = $manifestPaths;
    }

    public function getKey(): string
    {
        return 'hihaho_named_argument_manifest';
    }

    public function getHash(): string
    {
        // One path keeps the raw per-file hash (and its sentinels) verbatim; several
        // are folded into one digest so any manifest changing reprocesses.
        if (count($this->manifestPaths) === 1) {
            return $this->hashOne($this->manifestPaths[0]);
        }

        $parts = array_map($this->hashOne(...), $this->manifestPaths);

        return hash('sha256', implode('|', $parts));
    }

    private function hashOne(string $manifestPath): string
    {
        if (! is_file($manifestPath)) {
            return 'manifest-missing';
        }

        if (! is_readable($manifestPath)) {
            return 'manifest-unreadable';
        }

        // hash_file() can still return false on a race (file vanished/locked between
        // the checks); guard the cast so an empty-string hash never collides across
        // manifests.
        $hash = hash_file('sha256', $manifestPath);

        return $hash === false ? 'manifest-unreadable' : $hash;
    }
}
