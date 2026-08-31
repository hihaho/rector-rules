<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses\Support;

use Rector\Configuration\Option;
use Rector\Configuration\Parameter\SimpleParameterProvider;
use Throwable;

/**
 * What the suffix scan's caches are keyed on.
 *
 * Two keys, deliberately different. The decisions key includes a digest of the whole
 * corpus, because a decision depends on every file. The declarations key does not — a
 * file's syntax depends only on that file, and keying it per corpus state is exactly what
 * made an edit re-read everything.
 *
 * Both carry what changes the answer without touching a corpus file: the installed
 * packages (the candidate test reflects over a parent class) and this package's own rule
 * sources.
 *
 * @internal not public API; may change in any release
 *
 * @see \Hihaho\RectorRules\Tests\Rector\NamingClasses\Support\ScanCacheKeysTest
 */
final readonly class ScanCacheKeys
{
    /**
     * @param  string|null  $packageFingerprint  identifies the code that produced a scan;
     *                                           null disables caching for this run
     */
    public function __construct(
        private CorpusFiles $corpusFiles,
        private ?string $packageFingerprint,
    ) {}

    /**
     * @param  list<string>  $paths
     */
    public function cacheKeyFor(string $key, array $paths): ?string
    {
        if ($this->packageFingerprint === null) {
            return null;
        }

        try {
            return json_encode([
                'package' => $this->packageFingerprint,
                'rule' => $key,
                'paths' => $paths,
                'skip' => SimpleParameterProvider::provideArrayParameter(Option::SKIP),
                'suffixes' => $this->corpusFiles->destinationSuffixes(),
                'corpus' => $this->corpusFiles->fingerprintOf($paths),
            ], JSON_THROW_ON_ERROR);
        } catch (Throwable) {
            return null;
        }
    }

    /**
     * @param  list<string>  $paths
     */
    public function declarationCacheKeyFor(array $paths): ?string
    {
        if ($this->packageFingerprint === null) {
            return null;
        }

        try {
            return json_encode([
                'package' => $this->packageFingerprint,
                'paths' => $paths,
                'skip' => SimpleParameterProvider::provideArrayParameter(Option::SKIP),
                'suffixes' => $this->corpusFiles->destinationSuffixes(),
            ], JSON_THROW_ON_ERROR);
        } catch (Throwable) {
            return null;
        }
    }

    public function cacheWasCleared(): bool
    {
        $argv = $_SERVER['argv'] ?? [];

        return is_array($argv) && in_array('--clear-cache', $argv, true);
    }
}
