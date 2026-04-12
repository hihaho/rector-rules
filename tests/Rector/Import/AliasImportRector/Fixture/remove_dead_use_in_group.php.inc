<?php

namespace App\Services;

use Illuminate\Database\Eloquent\{Builder, Collection};
use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

final class GroupMixService
{
    public function filter(Builder $query, Collection $rows): EloquentQueryBuilder
    {
        return $query;
    }
}

-----
<?php

namespace App\Services;

use Illuminate\Database\Eloquent\{Collection as EloquentCollection};
use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

final class GroupMixService
{
    public function filter(EloquentQueryBuilder $query, EloquentCollection $rows): EloquentQueryBuilder
    {
        return $query;
    }
}
