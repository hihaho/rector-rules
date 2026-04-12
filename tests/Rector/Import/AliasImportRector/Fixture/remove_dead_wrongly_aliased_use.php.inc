<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder as WrongAlias;
use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

final class QueryService
{
    public function search(WrongAlias $query): EloquentQueryBuilder
    {
        return $query;
    }
}

-----
<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

final class QueryService
{
    public function search(EloquentQueryBuilder $query): EloquentQueryBuilder
    {
        return $query;
    }
}
