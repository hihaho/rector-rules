<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Support;

use Rector\ValueObject\Application\File;

/**
 * Per-file memo of "is this file inside directory X" verdicts, keyed by File identity.
 *
 * The directory-context rules (routing, migration) gate every matching node on a
 * directory check, but refactor() runs per node while the verdict is constant for a
 * whole file. This memo hoists the str_replace + str_contains scan to once per file:
 * the hot path becomes a single object-identity compare against the last File seen,
 * with no allocation or hashing.
 *
 * The state lives here, not on the consuming trait: a trait property — instance or
 * static — is rejected by a `readonly class` host (some rules and test doubles are
 * readonly), so the memo cannot live on the host class itself. Scalar statics (rather
 * than a marker-keyed array) keep the hot path free of per-node string hashing.
 *
 * Implementation detail — not part of the package's public API.
 *
 * @internal
 * @see \Hihaho\RectorRules\Tests\Rector\Support\DirectoryContextCacheTest
 */
final class DirectoryContextCache
{
    private static ?File $routesFile = null;

    private static bool $routesVerdict = false;

    private static ?File $migrationsFile = null;

    private static bool $migrationsVerdict = false;

    public static function isInRoutesDirectory(File $file): bool
    {
        if ($file === self::$routesFile) {
            return self::$routesVerdict;
        }

        self::$routesFile = $file;

        return self::$routesVerdict = self::resolve($file->getFilePath(), 'routes');
    }

    public static function isInMigrationsDirectory(File $file): bool
    {
        if ($file === self::$migrationsFile) {
            return self::$migrationsVerdict;
        }

        self::$migrationsFile = $file;

        return self::$migrationsVerdict = self::resolve($file->getFilePath(), 'migrations');
    }

    /**
     * True when $filePath sits inside a top-level $marker directory and not vendor/.
     */
    private static function resolve(string $filePath, string $marker): bool
    {
        // Normalise separators — getFilePath() returns backslash paths on Windows,
        // which would never match the forward-slash markers below.
        $normalized = str_replace('\\', '/', $filePath);

        if (str_contains($normalized, '/vendor/')) {
            return false;
        }

        return str_contains($normalized, "/{$marker}/");
    }
}
