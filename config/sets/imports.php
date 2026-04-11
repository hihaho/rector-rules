<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\Import\AliasImportRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AliasImportRector::class, [
        'Illuminate\Database\Eloquent\Builder' => 'EloquentQueryBuilder',
        'Illuminate\Database\Query\Builder' => 'QueryBuilder',
        'Illuminate\Database\Eloquent\Collection' => 'EloquentCollection',
    ]);
};
