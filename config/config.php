<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\NamingClasses\RenameDocBlockSeeTagRector;
use Hihaho\RectorRules\Rector\NamingClasses\Support\SuffixRenameMap;
use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\Name\RenameClassRector;

/**
 * Rename propagation for the suffix rules, reached two ways: auto-included through
 * `extra.rector.includes` when `rector/extension-installer` is present, and imported by
 * `config/sets/naming.php` so a set works without it. Loading it twice is harmless.
 */
return static function (RectorConfig $rectorConfig): void {
    // One instance across every suffix rule: they share the scan cache, the pending
    // file renames, and the single shutdown hook that applies them. Binding it as a
    // singleton also autotags it resettable, so the test harness clears it per class.
    $rectorConfig->singleton(SuffixRenameMap::class);

    // The suffix rules only record their renames; this is what rewrites the references.
    // Both rules return early on an empty rename map, so registering them for every
    // consumer costs nothing when no rename is found.
    $rectorConfig->rule(RenameClassRector::class);

    // `RenameClassRector` only reaches type positions in a docblock. `@see`, `@link` and
    // `@uses` are free text, so they need their own pass or they keep naming a class that
    // no longer exists — along with the `use` import that only they were keeping alive.
    $rectorConfig->rule(RenameDocBlockSeeTagRector::class);
};
