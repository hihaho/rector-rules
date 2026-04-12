<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Migration\Concerns;

trait ChecksMigrationContext
{
    private function isInMigrationsDirectory(): bool
    {
        $filePath = $this->getFile()->getFilePath();

        if (str_contains($filePath, '/vendor/')) {
            return false;
        }

        return str_contains($filePath, '/migrations/');
    }
}
