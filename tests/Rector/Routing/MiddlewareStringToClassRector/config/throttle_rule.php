<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\Routing\MiddlewareStringToClassRector;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->ruleWithConfiguration(MiddlewareStringToClassRector::class, [
        MiddlewareStringToClassRector::INCLUDE_THROTTLE => true,
        MiddlewareStringToClassRector::THROTTLE_CLASS => ThrottleRequests::class,
    ]);
};
