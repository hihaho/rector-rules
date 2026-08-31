<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses\Support;

/**
 * Carries the suffix scan's decisions between processes.
 *
 * Rector's parallel mode gives every worker its own container, so every worker's rule
 * constructors run the corpus scan again. Measured on a 3000-file corpus, one run did the
 * whole scan 26 times. The main process always scans first — it builds the container that
 * schedules the work — and every worker starts after it, so a result written at the end of
 * that first scan is warm for all of them, and for the next run of an unchanged corpus.
 *
 * The cache stores decisions, never parsed code: which classes the scan claims and which
 * it refused, as plain scalars. A miss costs a `stat()` per corpus file to build the key;
 * a hit saves the read-and-parse of every file in it.
 *
 * Every failure mode here is a miss, never a wrong answer: an unreadable, truncated,
 * foreign or malformed entry is discarded and the corpus is scanned.
 *
 * @internal not public API; may change in any release
 *
 * @see \Hihaho\RectorRules\Tests\Rector\NamingClasses\Support\ScanCacheTest
 *
 * @phpstan-type Decisions array{accepted: list<array{oldFqcn: string, newFqcn: string, newShortName: string, oldShortName: string, path: string, isOnlyClassInFile: bool}>, declined: list<string>}
 */
final readonly class ScanCache
{
    public function __construct(private JsonFileStore $jsonFileStore) {}

    /**
     * @return Decisions|null
     */
    public function load(string $cacheKey): ?array
    {
        $decoded = $this->jsonFileStore->read($cacheKey);

        return $this->isWellFormed($decoded) ? $decoded : null;
    }

    /**
     * @param  Decisions  $decisions
     */
    public function store(string $cacheKey, array $decisions): void
    {
        $this->jsonFileStore->write($cacheKey, $decisions);
    }

    /**
     * @phpstan-assert-if-true Decisions $decoded
     */
    private function isWellFormed(mixed $decoded): bool
    {
        if (! is_array($decoded) || ! isset($decoded['accepted'], $decoded['declined'])) {
            return false;
        }

        if (! is_array($decoded['accepted']) || ! is_array($decoded['declined'])) {
            return false;
        }

        foreach ($decoded['declined'] as $declined) {
            if (! is_string($declined)) {
                return false;
            }
        }

        foreach ($decoded['accepted'] as $candidate) {
            if (! is_array($candidate)) {
                return false;
            }

            foreach (['oldFqcn', 'newFqcn', 'newShortName', 'oldShortName', 'path'] as $stringField) {
                if (! isset($candidate[$stringField]) || ! is_string($candidate[$stringField])) {
                    return false;
                }
            }

            if (! isset($candidate['isOnlyClassInFile']) || ! is_bool($candidate['isOnlyClassInFile'])) {
                return false;
            }
        }

        return true;
    }
}
