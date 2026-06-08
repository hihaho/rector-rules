<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class Post
{
    public const string FEATURED_CATEGORY = 'featuredCategory';
}

class FeaturedCategory
{
    public const string TARGETS = 'targets';
}

function eager(Builder $query): void
{
    $query->with([
        Post::FEATURED_CATEGORY . '.' . FeaturedCategory::TARGETS,
    ]);
}
