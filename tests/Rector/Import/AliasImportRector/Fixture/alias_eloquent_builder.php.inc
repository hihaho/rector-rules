<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

final class VideoQueryBuilder extends Builder
{
    public function whichIsPublished(Builder $query): Builder
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
    public function whichIsPublished(EloquentQueryBuilder $query): EloquentQueryBuilder
    {
        return $query;
    }
}
