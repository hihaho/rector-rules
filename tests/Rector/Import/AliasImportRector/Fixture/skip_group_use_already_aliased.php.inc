<?php

namespace App\Services;

use Illuminate\Database\Eloquent\{Builder as EloquentQueryBuilder, Collection as EloquentCollection};

final class AlreadyAliasedGroup
{
    public function query(EloquentQueryBuilder $query): EloquentCollection
    {
        return new EloquentCollection();
    }
}
