<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');

    // Load the synthetic PropertiesClassReflectionExtension into Rector's own
    // PHPStan engine, so a dynamic property that bare PHPStan can't resolve gains
    // a concrete type — the in-engine alternative to the manifest bridge.
    $rectorConfig->phpstanConfig(__DIR__ . '/phpstan-extension.neon');

    $rectorConfig->ruleWithConfiguration(FirstPartyFlagArgumentToNamedRector::class, [
        FirstPartyFlagArgumentToNamedRector::FIRST_PARTY_NAMESPACES => [
            'Hihaho\\RectorRules\\Tests\\Rector\\CodeQuality\\FirstPartyFlagArgumentToNamedRector\\Source\\FirstParty\\',
        ],
    ]);
};
