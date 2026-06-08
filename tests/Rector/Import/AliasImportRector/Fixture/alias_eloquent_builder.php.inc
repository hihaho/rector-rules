<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

final class ArticleQueryBuilder extends Builder
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

final class ArticleQueryBuilder extends EloquentQueryBuilder
{
    public function whichIsPublished(EloquentQueryBuilder $query): EloquentQueryBuilder
    {
        return $query;
    }
}
