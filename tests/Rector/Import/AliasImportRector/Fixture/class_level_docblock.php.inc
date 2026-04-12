<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method Builder active()
 * @property Builder $queryBuilder
 * @mixin Builder
 */
final class Video
{
}

-----
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

/**
 * @method EloquentQueryBuilder active()
 * @property EloquentQueryBuilder $queryBuilder
 * @mixin EloquentQueryBuilder
 */
final class Video
{
}
