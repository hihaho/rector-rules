<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\NamingClasses\RenameDocBlockSeeTagRector;
use Hihaho\RectorRules\Rector\NamingClasses\Support\SuffixRenameMap;
use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\Name\RenameClassRector;

/**
 * Package-level services, loaded unconditionally.
 *
 * Auto-included through `extra.rector.includes` in `composer.json` when
 * `rector/extension-installer` is present, and imported explicitly by
 * `config/sets/naming.php` so the suffix rules work through a set either way.
 *
 * This used to be pulled in per rule via `RelatedConfigInterface::getConfigFile()`.
 * Rector 2.6.5 removed that interface (rectorphp/rector-src#8395), so the wiring lives
 * here instead — registering it unconditionally costs nothing, see below.
 *
 * The suffix rules register their renames with `RenamedClassesDataCollector`;
 * `RenameClassRector` is what reads that map and rewrites the references.
 */
return static function (RectorConfig $rectorConfig): void {
    // One instance across every suffix rule: they share the scan cache, the pending
    // file renames, and the single shutdown hook that applies them. Binding it as a
    // singleton also autotags it resettable, so the test harness clears it per class.
    $rectorConfig->singleton(SuffixRenameMap::class);

    // `RenameClassRector` with no configuration of its own is inert — it returns early on
    // an empty map — so registering it for every consumer costs nothing when no rename
    // is found.
    $rectorConfig->rule(RenameClassRector::class);

    // `RenameClassRector` only reaches type positions in a docblock. `@see`, `@link` and
    // `@uses` are free text, so they need their own pass or they keep naming a class that
    // no longer exists — along with the `use` import that only they were keeping alive.
    // It short-circuits on an empty rename map too.
    $rectorConfig->rule(RenameDocBlockSeeTagRector::class);
};
