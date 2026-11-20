<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\CodeQuality\VendorMinArgumentsToNamedRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    // The default vendor namespaces: Illuminate\ only.
    $rectorConfig->rule(VendorMinArgumentsToNamedRector::class);
};
