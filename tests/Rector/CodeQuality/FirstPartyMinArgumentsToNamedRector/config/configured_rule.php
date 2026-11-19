<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->ruleWithConfiguration(FirstPartyMinArgumentsToNamedRector::class, [
        // Source\Vendor\* stands in for third-party code.
        FirstPartyMinArgumentsToNamedRector::FIRST_PARTY_NAMESPACES => [
            'Hihaho\\RectorRules\\Tests\\Rector\\CodeQuality\\FirstPartyMinArgumentsToNamedRector\\Source\\FirstParty\\',
        ],
    ]);
};
