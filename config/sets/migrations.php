<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\Migration\InlineMigrationConstantsRector;
use Hihaho\RectorRules\Rector\Migration\RemoveAfterColumnPositioningRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rules([
        RemoveAfterColumnPositioningRector::class,
        InlineMigrationConstantsRector::class,
    ]);
};
