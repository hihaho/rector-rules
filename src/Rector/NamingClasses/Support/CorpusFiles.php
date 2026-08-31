<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses\Support;

use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

/**
 * Everything the suffix rules' corpus walk needs from the filesystem: which files there
 * are, their contents, and whether a file is worth parsing at all.
 *
 * Split out of `SuffixRenameMap` because all four suffix rules walk the same corpus and
 * every one of these answers is worth remembering across them — a recursive directory
 * walk and a read per file, repeated four times, was most of what the walk cost.
 *
 * @internal not public API; may change in any release
 *
 * @see \Hihaho\RectorRules\Tests\Rector\NamingClasses\Support\SuffixRenameMapTest
 */
final class CorpusFiles
{
    /**
     * Every suffix the rules in this package rename *to*. The walk uses the union to
     * decide which files it can skip without parsing, so a rule whose suffix is missing
     * here would silently lose collision safety — `SuffixRenameMap::register()` throws
     * rather than let that happen. Adding a suffix rule means adding its suffix here.
     *
     * Keep them narrow. Every file whose bytes contain one of these is parsed, so a
     * common word here (`Collection`, say) quietly puts the whole corpus back through the
     * parser.
     *
     * @var list<string>
     */
    public const array DESTINATION_SUFFIXES = ['Command', 'Mail', 'Notification', 'Resource'];

    /**
     * File list per resolved path set. Every registering rule walks the same directories.
     *
     * @var array<string, list<string>>
     */
    private array $filePathsByPathSet = [];

    /**
     * Files proved unable to contribute to any suffix rule, so no later rule re-reads them.
     *
     * @var array<string, true>
     */
    private array $filteredOut = [];

    /**
     * One-slot read cache. The walk reads a file to decide whether to parse it and then
     * parses that same file, so this turns two reads into one without holding the whole
     * corpus in memory.
     */
    private ?string $lastReadPath = null;

    private ?string $lastReadContents = null;

    public function reset(): void
    {
        $this->filePathsByPathSet = [];
        $this->filteredOut = [];
        $this->lastReadPath = null;
        $this->lastReadContents = null;
    }

    /**
     * Every `.php` file under the given paths, in a stable order.
     *
     * @param  list<string>  $paths
     * @return list<string>
     */
    public function in(array $paths): array
    {
        $pathSetKey = implode('|', $paths);

        if (isset($this->filePathsByPathSet[$pathSetKey])) {
            return $this->filePathsByPathSet[$pathSetKey];
        }

        $filePaths = [];

        foreach ($paths as $path) {
            if (is_file($path)) {
                if (pathinfo($path, PATHINFO_EXTENSION) === 'php') {
                    $filePaths[] = $path;
                }

                continue;
            }

            if (! is_dir($path)) {
                continue;
            }

            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS),
            );

            foreach ($iterator as $fileInfo) {
                if ($fileInfo instanceof SplFileInfo && $fileInfo->getExtension() === 'php') {
                    $filePaths[] = $fileInfo->getPathname();
                }
            }
        }

        $filePaths = array_values(array_unique($filePaths));

        sort($filePaths);

        return $this->filePathsByPathSet[$pathSetKey] = $filePaths;
    }

    /**
     * @param  bool  $fresh  Bypass the cache. Required by callers that must see a file as
     *                       Rector has just written it, rather than as the scan read it.
     */
    public function contentsOf(string $filePath, bool $fresh = false): ?string
    {
        if (! $fresh && $this->lastReadPath === $filePath) {
            return $this->lastReadContents;
        }

        $contents = @file_get_contents($filePath);

        $this->lastReadPath = $filePath;
        $this->lastReadContents = $contents === false ? null : $contents;

        return $this->lastReadContents;
    }

    /**
     * Whether the file can change the outcome of the scan, decided from its bytes rather
     * than by parsing it — parsing is by far the most expensive thing the walk does.
     *
     * The walk takes two things from a file: rename candidates, and class-like names a
     * rename could collide with. A candidate must extend something, so a file with no
     * `extends` holds none. A collision is only ever looked up under a name a rule renames
     * *to*, and all of those contain one of `DESTINATION_SUFFIXES` — a class-like name is
     * spelled literally in source and cannot be assembled at runtime, so a file that never
     * spells one cannot declare a colliding name.
     *
     * Both tests are deliberately over-permissive: `extends` in a comment, or a suffix
     * inside an unrelated word, costs one needless parse. Neither can be over-restrictive,
     * which is what would drop a rename or wave a collision through.
     */
    public function mayContribute(string $filePath): bool
    {
        if (isset($this->filteredOut[$filePath])) {
            return false;
        }

        $contents = $this->contentsOf($filePath);

        if ($contents === null) {
            $this->filteredOut[$filePath] = true;

            return false;
        }

        if (stripos($contents, 'extends') !== false) {
            return true;
        }

        foreach (self::DESTINATION_SUFFIXES as $destinationSuffix) {
            if (stripos($contents, $destinationSuffix) !== false) {
                return true;
            }
        }

        $this->filteredOut[$filePath] = true;

        return false;
    }
}
