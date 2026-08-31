<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses\Support;

use JsonException;
use Throwable;

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
    public function __construct(private string $directory) {}

    /**
     * @return Decisions|null
     */
    public function load(string $cacheKey): ?array
    {
        $filePath = $this->pathFor($cacheKey);

        if (! is_file($filePath)) {
            return null;
        }

        $contents = @file_get_contents($filePath);

        if ($contents === false) {
            return null;
        }

        try {
            /** @var mixed $decoded */
            $decoded = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            // A half-written or hand-edited entry. Scanning is always a correct answer.
            return null;
        }

        return $this->isWellFormed($decoded) ? $decoded : null;
    }

    /**
     * @param  Decisions  $decisions
     */
    public function store(string $cacheKey, array $decisions): void
    {
        // 0700, not the default 0777: the directory usually lands under a predictable
        // path in the system temp dir, and an entry is trusted enough to drive renames
        // across a codebase. Another user on the host must not be able to plant one.
        if (! is_dir($this->directory) && ! @mkdir($this->directory, 0o700, true) && ! is_dir($this->directory)) {
            return;
        }

        try {
            $contents = json_encode($decisions, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            return;
        }

        // Workers read this while the run is in flight, so it has to appear whole or not
        // at all — write beside the destination and move it into place.
        $temporaryPath = $this->pathFor($cacheKey) . '.' . getmypid() . '.tmp';

        try {
            if (@file_put_contents($temporaryPath, $contents) === false) {
                return;
            }

            if (! @rename($temporaryPath, $this->pathFor($cacheKey))) {
                @unlink($temporaryPath);
            }
        } catch (Throwable) {
            @unlink($temporaryPath);
        }
    }

    private function pathFor(string $cacheKey): string
    {
        return $this->directory . '/' . hash('xxh128', $cacheKey) . '.json';
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
