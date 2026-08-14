<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses\Support;

/**
 * Rewrites class references inside the docblock tags that carry free text rather than a
 * type — `@see`, `@link`, `@uses`, and their inline `{@see …}` / `{@link …}` forms.
 *
 * Rector's own docblock renamer only visits `IdentifierTypeNode`, i.e. type positions
 * (`@param`, `@return`, `@var`). The tags handled here are parsed as opaque text, so a
 * rename never reaches them and they are left pointing at a class that no longer exists.
 *
 * @internal not public API; may change in any release
 *
 * @see \Hihaho\RectorRules\Tests\Rector\NamingClasses\Support\DocBlockSeeTagRenamerTest
 */
final class DocBlockSeeTagRenamer
{
    /**
     * Standalone tags: `@see Foo`, `@link \App\Foo`, `@uses Foo::bar()`. The class name is
     * captured without any `::member` suffix, so that suffix survives untouched.
     */
    private const string STANDALONE_TAG_PATTERN = '/(@(?:see|link|uses)\s+)(\\\\?[A-Za-z_\x80-\xff][A-Za-z0-9_\x80-\xff]*(?:\\\\[A-Za-z_\x80-\xff][A-Za-z0-9_\x80-\xff]*)*)/';

    /**
     * Inline tags: `{@see Foo}`, `{@link \App\Foo::bar()}`.
     */
    private const string INLINE_TAG_PATTERN = '/(\{@(?:see|link)\s+)(\\\\?[A-Za-z_\x80-\xff][A-Za-z0-9_\x80-\xff]*(?:\\\\[A-Za-z_\x80-\xff][A-Za-z0-9_\x80-\xff]*)*)/';

    /**
     * @param  array<string, string>  $oldToNewClasses  Old FQCN => new FQCN.
     * @param  array<string, string>  $aliasToFqcn  Lowercased alias => FQCN, from the file's `use` statements.
     * @return string|null The rewritten docblock, or null when nothing changed.
     */
    public function rename(
        string $docBlock,
        array $oldToNewClasses,
        ?string $currentNamespace,
        array $aliasToFqcn,
    ): ?string {
        if ($oldToNewClasses === []) {
            return null;
        }

        $shortNameIndex = $this->indexByShortName($oldToNewClasses);

        $replace = function (array $matches) use ($oldToNewClasses, $currentNamespace, $aliasToFqcn, $shortNameIndex): string {
            /** @var array{0: string, 1: string, 2: string} $matches */
            $reference = $matches[2];

            $resolution = $this->resolve($reference, $oldToNewClasses, $currentNamespace, $aliasToFqcn, $shortNameIndex);

            if ($resolution === null) {
                return $matches[0];
            }

            [$oldFqcn, $viaExplicitAlias, $viaImport] = $resolution;

            // `use App\Old as Legacy;` keeps the alias when the import is rewritten, so
            // `{@see Legacy}` is already correct and must be left alone.
            if ($viaExplicitAlias) {
                return $matches[0];
            }

            $newFqcn = $oldToNewClasses[$oldFqcn];

            // A short reference that only resolved through an import is rewritten fully
            // qualified: the tag then stands on its own instead of depending on an import
            // that may be removed as unused. A short reference resolved within the file's
            // own namespace needs no import, so it stays short.
            $replacement = str_starts_with($reference, '\\') || $viaImport
                ? '\\' . $newFqcn
                : $this->shortNameOf($newFqcn);

            return $matches[1] . $replacement;
        };

        $rewritten = preg_replace_callback(self::STANDALONE_TAG_PATTERN, $replace, $docBlock);

        if (! is_string($rewritten)) {
            return null;
        }

        $rewritten = preg_replace_callback(self::INLINE_TAG_PATTERN, $replace, $rewritten);

        if (! is_string($rewritten) || $rewritten === $docBlock) {
            return null;
        }

        return $rewritten;
    }

    /**
     * Resolve a docblock reference to one of the renamed classes, following PHP's own
     * name resolution: leading `\` is absolute, a first segment matching an import wins,
     * anything else is relative to the current namespace.
     *
     * @param  array<string, string>  $oldToNewClasses
     * @param  array<string, string>  $aliasToFqcn
     * @param  array<string, list<string>>  $shortNameIndex
     * @return array{string, bool, bool}|null The matched old FQCN, whether it was reached
     *                                         through an explicit `as` alias, and whether
     *                                         it was reached through an import at all.
     */
    private function resolve(
        string $reference,
        array $oldToNewClasses,
        ?string $currentNamespace,
        array $aliasToFqcn,
        array $shortNameIndex,
    ): ?array {
        if (str_starts_with($reference, '\\')) {
            $resolved = $this->match(ltrim($reference, '\\'), $oldToNewClasses);

            return $resolved === null ? null : [$resolved, false, false];
        }

        $segments = explode('\\', $reference);
        $firstSegment = strtolower($segments[0]);

        if (isset($aliasToFqcn[$firstSegment])) {
            $aliasTarget = $aliasToFqcn[$firstSegment];
            $segments[0] = $aliasTarget;

            $resolved = $this->match(implode('\\', $segments), $oldToNewClasses);

            if ($resolved !== null) {
                $isExplicitAlias = strcasecmp($firstSegment, $this->shortNameOf($aliasTarget)) !== 0;

                return [$resolved, $isExplicitAlias, true];
            }
        }

        if ($currentNamespace !== null) {
            $resolved = $this->match($currentNamespace . '\\' . $reference, $oldToNewClasses);

            if ($resolved !== null) {
                return [$resolved, false, false];
            }
        }

        $resolved = $this->match($reference, $oldToNewClasses);

        if ($resolved !== null) {
            return [$resolved, false, false];
        }

        // The import may already have been rewritten to the new name by the time this
        // runs, which breaks alias resolution for the old one. Fall back to the short
        // name, but only when it identifies exactly one renamed class — never guess
        // between two.
        $candidates = $shortNameIndex[strtolower($reference)] ?? [];

        return count($candidates) === 1 ? [$candidates[0], false, true] : null;
    }

    /**
     * @param  array<string, string>  $oldToNewClasses
     */
    private function match(string $fqcn, array $oldToNewClasses): ?string
    {
        foreach ($oldToNewClasses as $oldFqcn => $newFqcn) {
            if (strcasecmp($oldFqcn, $fqcn) === 0) {
                return $oldFqcn;
            }
        }

        return null;
    }

    /**
     * @param  array<string, string>  $oldToNewClasses
     * @return array<string, list<string>>
     */
    private function indexByShortName(array $oldToNewClasses): array
    {
        $index = [];

        foreach (array_keys($oldToNewClasses) as $oldFqcn) {
            $index[strtolower($this->shortNameOf($oldFqcn))][] = $oldFqcn;
        }

        return $index;
    }

    private function shortNameOf(string $fqcn): string
    {
        $position = strrpos($fqcn, '\\');

        return $position === false ? $fqcn : substr($fqcn, $position + 1);
    }
}
