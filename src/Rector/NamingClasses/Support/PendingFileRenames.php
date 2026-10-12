<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses\Support;

use Closure;

/**
 * File renames to apply once the run has written its changes. Rector has no file-move
 * API, so the queue flushes on shutdown, after every file is written.
 *
 * @internal
 */
final class PendingFileRenames
{
    /**
     * @var list<array{path: string, oldShortName: string, newShortName: string}>
     */
    private array $renames = [];

    private bool $shutdownRegistered = false;

    /**
     * @param  Closure(string, string): bool  $declaresShortName
     */
    public function __construct(
        private readonly Closure $declaresShortName,
    ) {}

    public function add(string $path, string $oldShortName, string $newShortName): void
    {
        $this->renames[] = [
            'path' => $path,
            'oldShortName' => $oldShortName,
            'newShortName' => $newShortName,
        ];

        $this->registerShutdownFlush();
    }

    public function reset(): void
    {
        $this->renames = [];
    }

    /**
     * Each guard below also makes `--dry-run` a no-op: nothing was written, so the new
     * class name is never found on disk.
     */
    public function flush(): void
    {
        foreach ($this->renames as $rename) {
            $path = $rename['path'];

            if (! is_file($path)) {
                continue;
            }

            // Rector did not write the rename — a dry run, or another worker owns this
            // file. Parsed rather than grepped, so a mention of the name in a comment or
            // a string literal cannot be mistaken for the declaration.
            if (! ($this->declaresShortName)($path, $rename['newShortName'])) {
                continue;
            }

            $destination = dirname($path) . '/' . $rename['newShortName'] . '.php';

            if (file_exists($destination)) {
                continue;
            }

            if (! @rename($path, $destination)) {
                // Loud, because the tree is now inconsistent: the class was renamed but
                // its file was not, so it no longer autoloads.
                fwrite(
                    STDERR,
                    sprintf(
                        '[hihaho/rector-rules] Could not rename "%s" to "%s". The class was renamed but the file was not, so it will not autoload. Rename it by hand.%s',
                        $path,
                        basename($destination),
                        PHP_EOL,
                    ),
                );
            }
        }

        $this->renames = [];
    }

    private function registerShutdownFlush(): void
    {
        if ($this->shutdownRegistered) {
            return;
        }

        $this->shutdownRegistered = true;

        register_shutdown_function(function (): void {
            $this->flush();
        });
    }
}
