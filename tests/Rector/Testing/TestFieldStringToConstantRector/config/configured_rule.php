<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\Testing\TestFieldStringToConstantRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->importNames();
    $rectorConfig->ruleWithConfiguration(TestFieldStringToConstantRector::class, [
        TestFieldStringToConstantRector::MANIFEST => __DIR__ . '/manifest.json',
    ]);
};
