<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses\Support;

use JsonException;
use Throwable;

/**
 * A keyed JSON store the suffix scan's caches sit on.
 *
 * Rector's parallel workers read these while another process writes them, so an entry has
 * to appear whole or not at all: each write lands beside its destination and is moved into
 * place. Every failure mode is a miss rather than a wrong answer — an unreadable,
 * truncated, foreign or malformed entry is discarded and the caller does the work again.
 *
 * @internal not public API; may change in any release
 *
 * @see \Hihaho\RectorRules\Tests\Rector\NamingClasses\Support\JsonFileStoreTest
 */
final readonly class JsonFileStore
{
    public function __construct(private string $directory) {}

    /**
     * @return array<mixed>|null
     */
    public function read(string $cacheKey): ?array
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
            return null;
        }

        return is_array($decoded) ? $decoded : null;
    }

    /**
     * @param  array<mixed>  $payload
     */
    public function write(string $cacheKey, array $payload): void
    {
        // 0700, not the default 0777: the directory usually lands under a predictable path
        // in the system temp dir, and an entry is trusted enough to drive renames across a
        // codebase. Another user on the host must not be able to plant one.
        if (! is_dir($this->directory) && ! @mkdir($this->directory, 0o700, true) && ! is_dir($this->directory)) {
            return;
        }

        try {
            $contents = json_encode($payload, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            return;
        }

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
}
