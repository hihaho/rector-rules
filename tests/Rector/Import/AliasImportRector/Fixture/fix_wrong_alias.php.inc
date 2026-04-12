<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder as WrongAlias;

final class SearchService
{
    public function search(WrongAlias $query): WrongAlias
    {
        return $query;
    }
}

-----
<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

final class SearchService
{
    public function search(EloquentQueryBuilder $query): EloquentQueryBuilder
    {
        return $query;
    }
}
