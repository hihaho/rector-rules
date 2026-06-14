<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Migration\Concerns;

use Hihaho\RectorRules\Rector\Support\DirectoryContextCache;

trait ChecksMigrationContext
{
    private function isInMigrationsDirectory(): bool
    {
        return DirectoryContextCache::isInMigrationsDirectory($this->getFile());
    }
}
