<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Migration\Concerns;

trait ChecksMigrationContext
{
    private function isInMigrationsDirectory(): bool
    {
        // Normalise separators — getFilePath() returns backslash paths on Windows,
        // which would never match the forward-slash markers below.
        $filePath = str_replace('\\', '/', $this->getFile()->getFilePath());

        if (str_contains($filePath, '/vendor/')) {
            return false;
        }

        return str_contains($filePath, '/migrations/');
    }
}
