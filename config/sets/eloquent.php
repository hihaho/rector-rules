<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\Eloquent\CollectedByAttributeRector;
use Hihaho\RectorRules\Rector\Eloquent\NestedArrayEagerLoadingRector;
use Hihaho\RectorRules\Rector\Eloquent\ObservedByAttributeRector;
use Hihaho\RectorRules\Rector\Eloquent\RelationNameToClassConstantRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rules([
        CollectedByAttributeRector::class,
        NestedArrayEagerLoadingRector::class,
        ObservedByAttributeRector::class,
        RelationNameToClassConstantRector::class,
    ]);
};
