<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->ruleWithConfiguration(FirstPartyFlagArgumentToNamedRector::class, [
        FirstPartyFlagArgumentToNamedRector::FIRST_PARTY_NAMESPACES => [
            'Hihaho\\RectorRules\\Tests\\Rector\\CodeQuality\\FirstPartyFlagArgumentToNamedRector\\Source\\FirstParty\\',
        ],
        FirstPartyFlagArgumentToNamedRector::NAME_PRECEDING_POSITIONALS => true,
    ]);
};
