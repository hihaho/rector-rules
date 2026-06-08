<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->ruleWithConfiguration(RemoveUnnecessaryNullsafeOperatorRector::class, [
        RemoveUnnecessaryNullsafeOperatorRector::TRUST_PHPDOC_TYPES => true,
    ]);
};
