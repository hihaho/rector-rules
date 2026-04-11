<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Migration\Concerns;

trait ChecksMigrationContext
{
    private function isInMigrationsDirectory(): bool
    {
        return str_contains($this->getFile()->getFilePath(), '/migrations/');
    }
}
