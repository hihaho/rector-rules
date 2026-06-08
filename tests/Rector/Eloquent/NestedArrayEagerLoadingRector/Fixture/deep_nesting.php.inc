<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class ModelA
{
    public const string X = 'x';
}

class ModelB
{
    public const string Y = 'y';
    public const string Q = 'q';
}

class ModelC
{
    public const string Z = 'z';
    public const string W = 'w';
}

function eager(Builder $query): void
{
    $query->with([
        ModelA::X . '.' . ModelB::Y . '.' . ModelC::Z,
        ModelA::X . '.' . ModelB::Y . '.' . ModelC::W,
        ModelA::X . '.' . ModelB::Q,
    ]);
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class ModelA
{
    public const string X = 'x';
}

class ModelB
{
    public const string Y = 'y';
    public const string Q = 'q';
}

class ModelC
{
    public const string Z = 'z';
    public const string W = 'w';
}

function eager(Builder $query): void
{
    $query->with([ModelA::X => [
        ModelB::Y => [
            ModelC::Z,
            ModelC::W,
        ],
        ModelB::Q,
    ]]);
}
