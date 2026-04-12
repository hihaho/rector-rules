<?php

namespace App\Services;

use Illuminate\Database\Eloquent\{Builder, Collection};

final class VideoService
{
    public function query(Builder $query): Collection
    {
        return new Collection();
    }
}

-----
<?php

namespace App\Services;

use Illuminate\Database\Eloquent\{Builder as EloquentQueryBuilder, Collection as EloquentCollection};

final class VideoService
{
    public function query(EloquentQueryBuilder $query): EloquentCollection
    {
        return new EloquentCollection();
    }
}
