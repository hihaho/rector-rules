<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class ArticleAiTask
{
    public const string ARTICLE = 'article';
    public const string USER = 'user';
}

class ArticleB
{
    public const string CONTAINER = 'container';
    public const string TAGS = 'tags';
    public const string INITIAL_ARTICLE_FOR_UPLOAD = 'initialArticleForUpload';
}

$query->with([
    ArticleAiTask::ARTICLE . '.' . ArticleB::CONTAINER,
    ArticleAiTask::ARTICLE . '.' . ArticleB::TAGS,
    ArticleAiTask::ARTICLE . '.' . ArticleB::INITIAL_ARTICLE_FOR_UPLOAD,
    ArticleAiTask::USER,
]);

?>
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class ArticleAiTask
{
    public const string ARTICLE = 'article';
    public const string USER = 'user';
}

class ArticleB
{
    public const string CONTAINER = 'container';
    public const string TAGS = 'tags';
    public const string INITIAL_ARTICLE_FOR_UPLOAD = 'initialArticleForUpload';
}

$query->with([
    ArticleAiTask::ARTICLE => [ArticleB::CONTAINER, ArticleB::TAGS, ArticleB::INITIAL_ARTICLE_FOR_UPLOAD],
    ArticleAiTask::USER,
]);

?>
