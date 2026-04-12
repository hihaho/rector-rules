<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\Import\AliasImportRector;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->ruleWithConfiguration(AliasImportRector::class, [
        Builder::class => 'EloquentQueryBuilder',
        Illuminate\Database\Query\Builder::class => 'QueryBuilder',
        Collection::class => 'EloquentCollection',
    ]);
};
