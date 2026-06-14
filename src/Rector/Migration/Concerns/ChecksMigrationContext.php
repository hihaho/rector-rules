<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Migration\Concerns;

use Hihaho\RectorRules\Rector\Support\DirectoryContextCache;

trait ChecksMigrationContext
{
    private function isInMigrationsDirectory(): bool
    {
        // The verdict is constant per file but refactor() runs per node; the cache
        // hoists the path scan to once per file. State lives in the cache (not a trait
        // property) so the trait stays usable inside a `readonly class` host.
        return DirectoryContextCache::isInMigrationsDirectory($this->getFile());
    }
}
