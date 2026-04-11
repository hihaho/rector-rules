<?php

namespace App\Services;

use Illuminate\Database\Query\Builder;

final class ReportService
{
    public function build(Builder $query): Builder
    {
        return $query;
    }
}

-----
<?php

namespace App\Services;

use Illuminate\Database\Query\Builder as QueryBuilder;

final class ReportService
{
    public function build(QueryBuilder $query): QueryBuilder
    {
        return $query;
    }
}
