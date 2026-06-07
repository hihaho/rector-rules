<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class Pivot
{
    public const string RELATION = 'relation';
    public const string CHILD = 'child';
    public const string SIBLING = 'sibling';
}

$query->with([
    Pivot::RELATION . '.' . Pivot::CHILD,
    Pivot::RELATION . '.' . Pivot::SIBLING,
    'pivot' => ['id', 'created_at'],
]);
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class Pivot
{
    public const string RELATION = 'relation';
    public const string CHILD = 'child';
    public const string SIBLING = 'sibling';
}

$query->with([
    Pivot::RELATION => [Pivot::CHILD, Pivot::SIBLING],
    'pivot' => ['id', 'created_at'],
]);
