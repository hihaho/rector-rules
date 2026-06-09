<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class JournalRelations
{
    public const string AUTHOR = 'author';
    public const string PROFILE = 'profile';
    public const string AVATAR = 'avatar';
}

function exitsViaToBase(Builder $query): void
{
    // toBase() is an explicit exit to the base query builder; the chain has
    // deliberately left Eloquent, so the rule must not climb past it and treat
    // the following with([...]) as eager loading.
    $query->toBase()->with([
        JournalRelations::AUTHOR . '.' . JournalRelations::PROFILE,
        JournalRelations::AUTHOR . '.' . JournalRelations::AVATAR,
    ]);
}
