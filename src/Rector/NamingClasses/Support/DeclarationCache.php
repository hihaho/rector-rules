<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses\Support;

/**
 * What each corpus file declares, remembered per file.
 *
 * The scan's decisions cache is keyed on a digest of the whole corpus, so a single edit
 * invalidates it and the next run re-reads and re-parses everything. During an editing
 * session that is every run. This layer sits underneath: it keys each file on its own
 * stat digest, so an edit costs one re-parse and leaves the other thousands as a `stat`.
 *
 * Only syntax is stored — the names a file declares and the shape of its classes. That is
 * a pure function of the file's bytes, so a file's own digest is a complete key for it.
 * Whether a class is a *rename candidate* depends on reflection over its parent, which
 * spans files and installed packages; that verdict is recomputed every run and is never
 * cached here.
 *
 * @internal not public API; may change in any release
 *
 * @see \Hihaho\RectorRules\Tests\Rector\NamingClasses\Support\DeclarationCacheTest
 *
 * @phpstan-type FileDeclarations array{digest: string, names: list<string>, classes: list<ClassDeclaration>}
 */
final readonly class DeclarationCache
{
    public function __construct(private JsonFileStore $jsonFileStore) {}

    /**
     * @return array<string, FileDeclarations>
     */
    public function load(string $cacheKey): array
    {
        $payload = $this->jsonFileStore->read($cacheKey);

        if ($payload === null) {
            return [];
        }

        $entries = [];

        foreach ($payload as $filePath => $entry) {
            if (! is_string($filePath) || ! $this->isWellFormed($entry)) {
                // One malformed entry only costs a re-parse of that file.
                continue;
            }

            $classes = [];

            foreach ($entry['classes'] as $class) {
                $classes[] = ClassDeclaration::fromArray($class);
            }

            $entries[$filePath] = [
                'digest' => $entry['digest'],
                'names' => $entry['names'],
                'classes' => $classes,
            ];
        }

        return $entries;
    }

    /**
     * @param  array<string, FileDeclarations>  $entries
     */
    public function store(string $cacheKey, array $entries): void
    {
        $payload = [];

        foreach ($entries as $filePath => $entry) {
            $classes = [];

            foreach ($entry['classes'] as $class) {
                $classes[] = $class->toArray();
            }

            $payload[$filePath] = [
                'digest' => $entry['digest'],
                'names' => $entry['names'],
                'classes' => $classes,
            ];
        }

        $this->jsonFileStore->write($cacheKey, $payload);
    }

    /**
     * @phpstan-assert-if-true array{digest: string, names: list<string>, classes: list<array{fqcn: string, shortName: string, parentFqcn: string|null, isAbstract: bool}>} $entry
     */
    private function isWellFormed(mixed $entry): bool
    {
        if (! is_array($entry) || ! isset($entry['digest'], $entry['names'], $entry['classes'])) {
            return false;
        }

        if (! is_string($entry['digest']) || ! is_array($entry['names']) || ! is_array($entry['classes'])) {
            return false;
        }

        foreach ($entry['names'] as $name) {
            if (! is_string($name)) {
                return false;
            }
        }

        foreach ($entry['classes'] as $class) {
            if (! is_array($class)) {
                return false;
            }

            if (! isset($class['fqcn'], $class['shortName'], $class['isAbstract'])) {
                return false;
            }

            if (! is_string($class['fqcn']) || ! is_string($class['shortName']) || ! is_bool($class['isAbstract'])) {
                return false;
            }

            // Null is the whole point for a class with no parent, so it is checked by key
            // presence rather than by isset().
            if (! array_key_exists('parentFqcn', $class)) {
                return false;
            }

            if ($class['parentFqcn'] !== null && ! is_string($class['parentFqcn'])) {
                return false;
            }
        }

        return true;
    }
}
