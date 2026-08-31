<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses\Support;

/**
 * This run's view of what every corpus file declares, backed by the per-file cache.
 *
 * A file is parsed only when its stat digest has moved since the entry was written, so an
 * edit costs one re-parse and leaves the rest of the corpus as a `stat`.
 *
 * @internal not public API; may change in any release
 *
 * @see \Hihaho\RectorRules\Tests\Rector\NamingClasses\Support\SuffixRenameMapTest
 *
 * @phpstan-type FileDeclarations array{digest: string, names: list<string>, classes: list<ClassDeclaration>}
 */
final class DeclarationIndex
{
    /** @var array<string, FileDeclarations> */
    private array $entries = [];

    /**
     * Files re-parsed this run whose modification time is still in the current second.
     * They are used in memory but never written, for the reason `CorpusFiles::isFileSettled()`
     * gives.
     *
     * @var array<string, true>
     */
    private array $unsettled = [];

    private ?string $cacheKey = null;

    private bool $isDirty = false;

    /**
     * How many entries the cache held when this run loaded it, so a corpus that only lost
     * files still gets written back instead of keeping them forever.
     */
    private int $loadedCount = 0;

    public function __construct(
        private readonly DeclarationCache $declarationCache,
        private readonly CorpusFiles $corpusFiles,
    ) {}

    public function reset(): void
    {
        $this->entries = [];
        $this->unsettled = [];
        $this->cacheKey = null;
        $this->isDirty = false;
        $this->loadedCount = 0;
    }

    /**
     * A null key means no caching for this run — the index still works, it just starts and
     * ends empty.
     */
    public function load(?string $cacheKey): void
    {
        if ($cacheKey === null || $cacheKey === $this->cacheKey) {
            return;
        }

        $this->cacheKey = $cacheKey;
        $this->entries = $this->declarationCache->load($cacheKey);
        $this->unsettled = [];
        $this->isDirty = false;
        $this->loadedCount = count($this->entries);
    }

    /**
     * What this file declares: from the cache when its digest still matches, otherwise from
     * `$parse`.
     *
     * `$parse` returning null means the file could not be read. Nothing is remembered in
     * that case — a failed read leaves size and timestamps untouched, so an empty entry
     * written from one would be reused for every later run and quietly take the file out of
     * collision detection.
     *
     * @param  callable(string): (array{names: list<string>, classes: list<ClassDeclaration>}|null)  $parse
     * @return FileDeclarations
     */
    public function forFile(string $filePath, callable $parse): array
    {
        $digest = $this->corpusFiles->digestOf($filePath);
        $cached = $this->entries[$filePath] ?? null;

        if ($cached !== null && $digest !== null && $cached['digest'] === $digest) {
            return $cached;
        }

        $parsed = $parse($filePath);

        if ($parsed === null) {
            return ['digest' => '', 'names' => [], 'classes' => []];
        }

        $entry = ['digest' => $digest ?? '', 'names' => $parsed['names'], 'classes' => $parsed['classes']];

        $this->entries[$filePath] = $entry;
        $this->isDirty = true;

        if ($digest === null || ! $this->corpusFiles->isFileSettled($filePath)) {
            $this->unsettled[$filePath] = true;
        }

        return $entry;
    }

    /**
     * @param  list<string>  $filePaths  the corpus as it stands, so a deleted file does not linger
     */
    public function store(array $filePaths): void
    {
        if ($this->cacheKey === null) {
            return;
        }

        $entries = [];

        foreach ($filePaths as $filePath) {
            $entry = $this->entries[$filePath] ?? null;

            if ($entry === null || $entry['digest'] === '' || isset($this->unsettled[$filePath])) {
                continue;
            }

            $entries[$filePath] = $entry;
        }

        // Nothing parsed and nothing dropped means the file on disk already says this.
        if (! $this->isDirty && count($entries) === $this->loadedCount) {
            return;
        }

        $this->declarationCache->store($this->cacheKey, $entries);

        $this->isDirty = false;
        $this->loadedCount = count($entries);
    }
}
