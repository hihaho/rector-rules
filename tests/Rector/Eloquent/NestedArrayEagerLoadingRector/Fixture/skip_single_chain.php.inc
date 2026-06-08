<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class Post
{
    public const string FEATURED_CATEGORY = 'featuredCategory';
}

class FeaturedCategory
{
    public const string TARGETS = 'targets';
}

$query->with([
    Post::FEATURED_CATEGORY . '.' . FeaturedCategory::TARGETS,
]);
