<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\Routing\NormalizeRoutePathRector;
use Hihaho\RectorRules\Rector\Routing\RouteGroupArrayToMethodsRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rules([
        NormalizeRoutePathRector::class,
        RouteGroupArrayToMethodsRector::class,
    ]);
};
