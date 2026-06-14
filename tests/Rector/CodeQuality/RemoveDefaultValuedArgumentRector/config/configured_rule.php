<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\CodeQuality\RemoveDefaultValuedArgumentRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->ruleWithConfiguration(RemoveDefaultValuedArgumentRector::class, [
        // Gate the cascade path to the FirstParty Source namespace only; Source\Vendor\*
        // is treated as third-party. cascade_drop stays off (default) here.
        RemoveDefaultValuedArgumentRector::FIRST_PARTY_NAMESPACES => [
            'Hihaho\\RectorRules\\Tests\\Rector\\CodeQuality\\RemoveDefaultValuedArgumentRector\\Source\\FirstParty\\',
        ],
    ]);
};
