<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class LedgerRelations
{
    public const string AUTHOR = 'author';
    public const string PROFILE = 'profile';
    public const string AVATAR = 'avatar';
}

class LedgerSnapshot
{
    /** @param array<int|string, mixed> $relations */
    public function with(array $relations): self
    {
        return $this;
    }
}

/**
 * @extends Builder<\Illuminate\Database\Eloquent\Model>
 */
class LedgerQueryBuilder extends Builder
{
    public function toSnapshot(): LedgerSnapshot
    {
        return new LedgerSnapshot();
    }
}

function leavesEloquentBeforeWith(LedgerQueryBuilder $query): void
{
    // toSnapshot() returns a concrete non-Eloquent object, so the chain has
    // genuinely left the Eloquent builder before with(); the rule must not
    // climb past it and rewrite this unrelated fluent call.
    $query->toSnapshot()->with([
        LedgerRelations::AUTHOR . '.' . LedgerRelations::PROFILE,
        LedgerRelations::AUTHOR . '.' . LedgerRelations::AVATAR,
    ]);
}
