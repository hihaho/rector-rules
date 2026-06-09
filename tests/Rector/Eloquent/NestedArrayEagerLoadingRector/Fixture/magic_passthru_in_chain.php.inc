<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class BlogRelations
{
    public const string AUTHOR = 'author';
    public const string TAGS = 'tags';
}

class AuthorRelations
{
    public const string PROFILE = 'profile';
    public const string AVATAR = 'avatar';
    public const string ROLES = 'roles';
}

function eagerWithMagicPassthru(Builder $query): void
{
    // whereIntegerNotInRaw() is forwarded to the underlying query builder via
    // the Eloquent builder's @mixin, so the immediate receiver type collapses
    // away from the Eloquent builder. An earlier receiver in the chain ($query)
    // is still an Eloquent builder, so the rule must fire by walking the chain.
    $query
        ->whereIntegerNotInRaw('author_id', [])
        ->oldest('updated_at')
        ->with([
            BlogRelations::AUTHOR . '.' . AuthorRelations::PROFILE,
            BlogRelations::AUTHOR . '.' . AuthorRelations::AVATAR,
            BlogRelations::AUTHOR . '.' . AuthorRelations::ROLES,
            BlogRelations::TAGS,
        ]);
}

?>
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class BlogRelations
{
    public const string AUTHOR = 'author';
    public const string TAGS = 'tags';
}

class AuthorRelations
{
    public const string PROFILE = 'profile';
    public const string AVATAR = 'avatar';
    public const string ROLES = 'roles';
}

function eagerWithMagicPassthru(Builder $query): void
{
    // whereIntegerNotInRaw() is forwarded to the underlying query builder via
    // the Eloquent builder's @mixin, so the immediate receiver type collapses
    // away from the Eloquent builder. An earlier receiver in the chain ($query)
    // is still an Eloquent builder, so the rule must fire by walking the chain.
    $query
        ->whereIntegerNotInRaw('author_id', [])
        ->oldest('updated_at')
        ->with([
            BlogRelations::AUTHOR => [
                AuthorRelations::PROFILE,
                AuthorRelations::AVATAR,
                AuthorRelations::ROLES,
            ],
            BlogRelations::TAGS,
        ]);
}

?>
