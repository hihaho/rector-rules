<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

final class AlreadyAliased
{
    public function query(EloquentQueryBuilder $query): EloquentQueryBuilder
    {
        return $query;
    }
}
