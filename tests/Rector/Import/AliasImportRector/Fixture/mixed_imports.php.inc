<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use function array_map;
use const PHP_INT_MAX;

final class VideoService
{
    public function query(Builder $query): Builder
    {
        $capped = array_map(fn (int $x): int => min($x, PHP_INT_MAX), []);

        return $query;
    }
}

-----
<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;
use function array_map;
use const PHP_INT_MAX;

final class VideoService
{
    public function query(EloquentQueryBuilder $query): EloquentQueryBuilder
    {
        $capped = array_map(fn (int $x): int => min($x, PHP_INT_MAX), []);

        return $query;
    }
}
