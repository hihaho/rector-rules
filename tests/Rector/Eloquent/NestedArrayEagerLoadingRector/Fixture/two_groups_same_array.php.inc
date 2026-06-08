<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class Rel
{
    public const string A = 'a';
    public const string B = 'b';
    public const string X = 'x';
    public const string Y = 'y';
    public const string P = 'p';
    public const string Q = 'q';
}

function eager(Builder $query): void
{
    $query->with([
        Rel::A . '.' . Rel::X,
        Rel::B . '.' . Rel::P,
        Rel::A . '.' . Rel::Y,
        Rel::B . '.' . Rel::Q,
    ]);
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class Rel
{
    public const string A = 'a';
    public const string B = 'b';
    public const string X = 'x';
    public const string Y = 'y';
    public const string P = 'p';
    public const string Q = 'q';
}

function eager(Builder $query): void
{
    $query->with([
        Rel::A => [
            Rel::X,
            Rel::Y,
        ],
        Rel::B => [
            Rel::P,
            Rel::Q,
        ],
    ]);
}
