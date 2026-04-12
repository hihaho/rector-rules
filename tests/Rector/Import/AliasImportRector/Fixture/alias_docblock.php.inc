<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

final class VideoQueryBuilder extends Builder
{
    /** @param Builder $query */
    public function forContainer($query): Builder
    {
        return $query;
    }
}

-----
<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

final class VideoQueryBuilder extends EloquentQueryBuilder
{
    /** @param EloquentQueryBuilder $query */
    public function forContainer($query): EloquentQueryBuilder
    {
        return $query;
    }
}
