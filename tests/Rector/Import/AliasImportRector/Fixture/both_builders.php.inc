<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

final class ArticleQueryBuilder extends Builder
{
    public function withSubQuery(QueryBuilder $subQuery): Builder
    {
        return $this;
    }
}

-----
<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

final class ArticleQueryBuilder extends EloquentQueryBuilder
{
    public function withSubQuery(QueryBuilder $subQuery): EloquentQueryBuilder
    {
        return $this;
    }
}
