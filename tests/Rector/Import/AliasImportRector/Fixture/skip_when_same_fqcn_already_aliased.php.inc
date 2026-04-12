<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

final class MixedImportsService
{
    public function query(Builder $query): EloquentQueryBuilder
    {
        return $query;
    }
}

-----
<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

final class MixedImportsService
{
    public function query(EloquentQueryBuilder $query): EloquentQueryBuilder
    {
        return $query;
    }
}
