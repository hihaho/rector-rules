<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class Video
{
    public const string CONTAINER = 'container';
}

class VideoContainer
{
    public const string USERS = 'users';
    public const string ANCESTORS = 'ancestors';
}

$query->with([
    Video::CONTAINER . '.' . VideoContainer::USERS,
    Video::CONTAINER . '.' . VideoContainer::ANCESTORS . '.' . VideoContainer::USERS,
]);

?>
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class Video
{
    public const string CONTAINER = 'container';
}

class VideoContainer
{
    public const string USERS = 'users';
    public const string ANCESTORS = 'ancestors';
}

$query->with([Video::CONTAINER => [VideoContainer::USERS, VideoContainer::ANCESTORS . '.' . VideoContainer::USERS]]);

?>
