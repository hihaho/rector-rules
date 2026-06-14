<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\CodeQuality\RemoveDefaultValuedArgumentRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->ruleWithConfiguration(RemoveDefaultValuedArgumentRector::class, [
        RemoveDefaultValuedArgumentRector::FIRST_PARTY_NAMESPACES => [
            'Hihaho\\RectorRules\\Tests\\Rector\\CodeQuality\\RemoveDefaultValuedArgumentRector\\Source\\FirstParty\\',
        ],
        RemoveDefaultValuedArgumentRector::CASCADE_DROP => true,
    ]);
};
