<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class VideoC
{
    public const string CONTAINER = 'container';
}

class VideoContainerC
{
    public const string USERS = 'users';
    public const string ANCESTORS = 'ancestors';
}

$query->with([
    VideoC::CONTAINER => [
        VideoContainerC::USERS,
        VideoContainerC::ANCESTORS,
    ],
]);
