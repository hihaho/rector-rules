<?php

namespace App\Services;

use App\Queries\EloquentQueryBuilder;
use Illuminate\Database\Eloquent\Builder;

final class UserQueryService
{
    public function filter(Builder $query, EloquentQueryBuilder $custom): Builder
    {
        return $query;
    }
}
