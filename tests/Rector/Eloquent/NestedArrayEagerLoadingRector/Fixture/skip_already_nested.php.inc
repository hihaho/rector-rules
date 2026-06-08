<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class ArticleC
{
    public const string CONTAINER = 'container';
}

class ArticleContainerC
{
    public const string USERS = 'users';
    public const string ANCESTORS = 'ancestors';
}

function eager(Builder $query): void
{
    $query->with([
        ArticleC::CONTAINER => [
            ArticleContainerC::USERS,
            ArticleContainerC::ANCESTORS,
        ],
    ]);
}
