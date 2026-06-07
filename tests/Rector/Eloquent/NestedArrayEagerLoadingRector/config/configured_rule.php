<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\Eloquent\NestedArrayEagerLoadingRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->rule(NestedArrayEagerLoadingRector::class);
};
