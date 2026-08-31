<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses\Support;

use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RuntimeException;
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
     * What the rules in this package rename *to*. Seeding the filter with all four up
     * front means the four built-in rules never widen it between their registrations,
     * which is what keeps the corpus down to one read and one parse per file.
     *
     * It is a seed, not a closed list: `widenTo()` accepts anything a rule declares,
     * including a suffix from a rule outside this package. Keep the seed narrow, though —
     * every file whose bytes contain one of these is parsed, so a common word here
     * (`Collection`, say) quietly puts the whole corpus back through the parser.
     *
     * @var list<string>
     */
    public const array DEFAULT_DESTINATION_SUFFIXES = ['Command', 'Mail', 'Notification', 'Resource'];

    /**
     * The substrings the filter currently tests for — the seed plus whatever registering
     * rules have added.
     *
     * @var list<string>
     */
    private array $destinationSuffixes = self::DEFAULT_DESTINATION_SUFFIXES;

    /**
     * File list per resolved path set. Every registering rule walks the same directories.
     *
     * @var array<string, list<string>>
     */
    private array $filePathsByPathSet = [];

    /**
     * Corpus digest per path set. Every registering rule asks for the same one, and it
     * costs a `stat()` per file to build.
     *
     * @var array<string, string>
     */
    private array $fingerprintByPathSet = [];

    /**
     * Size and modification time per file, captured during the walk that lists them —
     * `SplFileInfo` is already holding the stat at that point, so the digest costs one
     * pass over the corpus rather than two.
     *
     * @var array<string, array{mtime: int, size: int, inode: int}>
     */
    private array $statByFile = [];

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
        $this->destinationSuffixes = self::DEFAULT_DESTINATION_SUFFIXES;
        $this->filePathsByPathSet = [];
        $this->fingerprintByPathSet = [];
        $this->statByFile = [];
        $this->filteredOut = [];
        $this->lastReadPath = null;
        $this->lastReadContents = null;
    }

    /**
     * Teaches the filter about a rule's destination substrings, so a file that spells one
     * of them is parsed rather than skipped.
     *
     * A rule outside this package can rename to anything, so this has to accept anything.
     * Widening invalidates the skip verdicts already recorded: they were reached without
     * testing the new substrings, and a file skipped then may well declare a name that
     * collides with what the new rule is about to produce.
     *
     * @param  list<string>  $destinationSuffixes
     */
    public function widenTo(array $destinationSuffixes): void
    {
        $unknown = array_values(array_diff($destinationSuffixes, $this->destinationSuffixes));

        if ($unknown === []) {
            return;
        }

        $this->destinationSuffixes = [...$this->destinationSuffixes, ...$unknown];
        $this->filteredOut = [];
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
                    $this->rememberStat(new SplFileInfo($path));
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
                    $this->rememberStat($fileInfo);
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
    /**
     * Whether the corpus is settled enough for a digest of it to be trustworthy.
     *
     * Modification times have one-second granularity, so an edit that lands in the same
     * second the digest was taken — and does not change the file's length — produces an
     * identical digest. Storing a result under such a digest is how a later run gets a
     * stale answer that looks valid. Refusing to store while any file's mtime falls in the
     * current second closes that window: by the time a digest is stored, every file in it
     * has an mtime strictly in the past, so any subsequent edit must move it.
     *
     * @param  list<string>  $paths
     */
    public function isSettled(array $paths): bool
    {
        $currentSecond = time();

        foreach ($this->in($paths) as $filePath) {
            $stat = $this->statByFile[$filePath] ?? null;

            if ($stat === null || $stat['mtime'] >= $currentSecond) {
                return false;
            }
        }

        return true;
    }

    /**
     * A digest of the corpus as it was when its files were listed — every file the walk
     * would visit, with its size and modification time. Two runs that produce the same
     * digest see the same declarations, which is what makes a cached scan safe to reuse,
     * provided `isSettled()` held when it was stored.
     *
     * Memoised per path set alongside the listing, so it describes the corpus as of the
     * walk rather than as of the call.
     *
     * @param  list<string>  $paths
     */
    public function fingerprintOf(array $paths): string
    {
        $pathSetKey = implode('|', $paths);

        if (isset($this->fingerprintByPathSet[$pathSetKey])) {
            return $this->fingerprintByPathSet[$pathSetKey];
        }

        $parts = [];

        foreach ($this->in($paths) as $filePath) {
            $stat = $this->statByFile[$filePath] ?? null;

            // The inode is in here because size and mtime alone survive an `rsync -a`,
            // a `tar -x` or a restored CI workspace — all of which replace file contents
            // while preserving both. A restore allocates new inodes, so the digest moves.
            $parts[] = $stat === null
                ? $filePath . '|missing'
                : $filePath . '|' . $stat['mtime'] . '|' . $stat['size'] . '|' . $stat['inode'];
        }

        return $this->fingerprintByPathSet[$pathSetKey] = hash('xxh128', implode("\n", $parts));
    }

    private function rememberStat(SplFileInfo $fileInfo): void
    {
        try {
            $this->statByFile[$fileInfo->getPathname()] = [
                'mtime' => $fileInfo->getMTime(),
                'size' => $fileInfo->getSize(),
                'inode' => $fileInfo->getInode(),
            ];
        } catch (RuntimeException) {
            // Vanished between the listing and the stat; the digest records it as missing.
        }
    }

    /**
     * @return list<string>
     */
    public function destinationSuffixes(): array
    {
        return $this->destinationSuffixes;
    }

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
     * *to*, and all of those contain one of the substrings registered via `widenTo()` — a
     * class-like name is
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

        foreach ($this->destinationSuffixes as $destinationSuffix) {
            if (stripos($contents, $destinationSuffix) !== false) {
                return true;
            }
        }

        $this->filteredOut[$filePath] = true;

        return false;
    }
}
