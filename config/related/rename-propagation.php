<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\NamingClasses\RenameDocBlockSeeTagRector;
use Hihaho\RectorRules\Rector\NamingClasses\Support\SuffixRenameMap;
use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\Name\RenameClassRector;

/**
 * Pulled in automatically by every rule that renames a class declaration, via
 * `RelatedConfigInterface::getConfigFile()`.
 *
 * The suffix rules register their renames with `RenamedClassesDataCollector`;
 * `RenameClassRector` is what reads that map and rewrites the references. Registering
 * it here means a consumer gets working propagation from
 * `->withRules([AddNotificationSuffixRector::class])` alone, without having to know
 * about the coupling.
 *
 * `RenameClassRector` with no configuration of its own is inert — it returns early on
 * an empty map — so this costs nothing when no rename is found.
 */
return static function (RectorConfig $rectorConfig): void {
    // One instance across every suffix rule: they share the scan cache, the pending
    // file renames, and the single shutdown hook that applies them. Binding it as a
    // singleton also autotags it resettable, so the test harness clears it per class.
    $rectorConfig->singleton(SuffixRenameMap::class);

    $rectorConfig->rule(RenameClassRector::class);

    // `RenameClassRector` only reaches type positions in a docblock. `@see`, `@link` and
    // `@uses` are free text, so they need their own pass or they keep naming a class that
    // no longer exists — along with the `use` import that only they were keeping alive.
    $rectorConfig->rule(RenameDocBlockSeeTagRector::class);
};
