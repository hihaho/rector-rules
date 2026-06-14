<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\CodeQuality\NamedArgumentFromManifestRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->ruleWithConfiguration(NamedArgumentFromManifestRector::class, [
        NamedArgumentFromManifestRector::MANIFEST => __DIR__ . '/manifest.json',
    ]);
};
