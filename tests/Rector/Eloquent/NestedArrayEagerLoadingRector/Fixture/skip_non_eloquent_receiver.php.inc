<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class Rel
{
    public const string A = 'a';
    public const string B = 'b';
    public const string C = 'c';
}

// The receiver is not an Eloquent Builder/Model/Relation/Collection, so its
// with([...]) array must be left untouched even though the items share a prefix.
class CustomQueryBuilder
{
    public function with(array $relations): self
    {
        return $this;
    }
}

function eager(CustomQueryBuilder $query): void
{
    $query->with([
        Rel::A . '.' . Rel::B,
        Rel::A . '.' . Rel::C,
    ]);
}
