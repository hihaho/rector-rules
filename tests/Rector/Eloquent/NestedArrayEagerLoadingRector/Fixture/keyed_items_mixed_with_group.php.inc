<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class Pivot
{
    public const string RELATION = 'relation';
    public const string CHILD = 'child';
    public const string SIBLING = 'sibling';
}

function eager(Builder $query): void
{
    $query->with([
        Pivot::RELATION . '.' . Pivot::CHILD,
        Pivot::RELATION . '.' . Pivot::SIBLING,
        'pivot' => ['id', 'created_at'],
    ]);
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class Pivot
{
    public const string RELATION = 'relation';
    public const string CHILD = 'child';
    public const string SIBLING = 'sibling';
}

function eager(Builder $query): void
{
    $query->with([
        Pivot::RELATION => [Pivot::CHILD, Pivot::SIBLING],
        'pivot' => ['id', 'created_at'],
    ]);
}
