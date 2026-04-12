<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;

/**
 * @param Builder $query
 * @return Builder
 */
function normalise($query)
{
    return $query;
}

-----
<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

/**
 * @param EloquentQueryBuilder $query
 * @return EloquentQueryBuilder
 */
function normalise($query)
{
    return $query;
}
