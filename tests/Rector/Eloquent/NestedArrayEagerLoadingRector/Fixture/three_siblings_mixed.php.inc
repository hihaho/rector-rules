<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class Post
{
    public const string COMMENTS = 'comments';
    public const string AUTHOR = 'author';
}

class Comment
{
    public const string REPLIES = 'replies';
    public const string REACTIONS = 'reactions';
    public const string ATTACHMENTS = 'attachments';
}

function eager(Builder $query): void
{
    $query->with([
        Post::COMMENTS . '.' . Comment::REPLIES,
        Post::COMMENTS . '.' . Comment::REACTIONS,
        Post::COMMENTS . '.' . Comment::ATTACHMENTS,
        Post::AUTHOR,
    ]);
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Builder;

class Post
{
    public const string COMMENTS = 'comments';
    public const string AUTHOR = 'author';
}

class Comment
{
    public const string REPLIES = 'replies';
    public const string REACTIONS = 'reactions';
    public const string ATTACHMENTS = 'attachments';
}

function eager(Builder $query): void
{
    $query->with([
        Post::COMMENTS => [Comment::REPLIES, Comment::REACTIONS, Comment::ATTACHMENTS],
        Post::AUTHOR,
    ]);
}
