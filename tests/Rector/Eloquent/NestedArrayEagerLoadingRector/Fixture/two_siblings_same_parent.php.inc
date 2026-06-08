<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class Article
{
    public const string CONTAINER = 'container';
}

class ArticleContainer
{
    public const string USERS = 'users';
    public const string ANCESTORS = 'ancestors';
}

function eagerTwoSiblings(Builder $query): void
{
    $query->with([
        Article::CONTAINER . '.' . ArticleContainer::USERS,
        Article::CONTAINER . '.' . ArticleContainer::ANCESTORS . '.' . ArticleContainer::USERS,
    ]);
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class Article
{
    public const string CONTAINER = 'container';
}

class ArticleContainer
{
    public const string USERS = 'users';
    public const string ANCESTORS = 'ancestors';
}

function eagerTwoSiblings(Builder $query): void
{
    $query->with([Article::CONTAINER => [ArticleContainer::USERS, ArticleContainer::ANCESTORS . '.' . ArticleContainer::USERS]]);
}
