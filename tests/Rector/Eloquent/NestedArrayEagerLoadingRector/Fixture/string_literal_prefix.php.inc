<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

function eager(Builder $query): void
{
    $query->with([
        'container' . '.' . 'users',
        'container' . '.' . 'ancestors',
        'tags',
    ]);
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

function eager(Builder $query): void
{
    $query->with([
        'container' => [
            'users',
            'ancestors',
        ],
        'tags',
    ]);
}
