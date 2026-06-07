<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class VideoAiTask
{
    public const string VIDEO = 'video';
    public const string USER = 'user';
}

class VideoB
{
    public const string CONTAINER = 'container';
    public const string SUBTITLES = 'subtitles';
    public const string INITIAL_VIDEO_FOR_UPLOAD = 'initialVideoForUpload';
}

$query->with([
    VideoAiTask::VIDEO . '.' . VideoB::CONTAINER,
    VideoAiTask::VIDEO . '.' . VideoB::SUBTITLES,
    VideoAiTask::VIDEO . '.' . VideoB::INITIAL_VIDEO_FOR_UPLOAD,
    VideoAiTask::USER,
]);

?>
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class VideoAiTask
{
    public const string VIDEO = 'video';
    public const string USER = 'user';
}

class VideoB
{
    public const string CONTAINER = 'container';
    public const string SUBTITLES = 'subtitles';
    public const string INITIAL_VIDEO_FOR_UPLOAD = 'initialVideoForUpload';
}

$query->with([
    VideoAiTask::VIDEO => [VideoB::CONTAINER, VideoB::SUBTITLES, VideoB::INITIAL_VIDEO_FOR_UPLOAD],
    VideoAiTask::USER,
]);

?>
