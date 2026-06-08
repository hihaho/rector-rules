<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class ArticleC
{
    public const string CONTAINER = 'container';
}

class ArticleContainerC
{
    public const string USERS = 'users';
    public const string ANCESTORS = 'ancestors';
}

$query->with([
    ArticleC::CONTAINER => [
        ArticleContainerC::USERS,
        ArticleContainerC::ANCESTORS,
    ],
]);
