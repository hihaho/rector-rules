<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\Testing\TestFieldStringToConstantRector;
use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Middleware\Authenticate;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->importNames();
    $rectorConfig->ruleWithConfiguration(TestFieldStringToConstantRector::class, [
        TestFieldStringToConstantRector::ROUTE_FILES => [__DIR__ . '/../Source/routes.php'],
        TestFieldStringToConstantRector::INTERNAL_MIDDLEWARE => [Authenticate::class],
        TestFieldStringToConstantRector::FIRST_PARTY_PREFIX => 'Hihaho\\RectorRules\\Tests\\Rector\\Testing\\TestFieldStringToConstantRector\\Source\\',
    ]);
};
