<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

class TagModel
{
    public const string ARTICLES = 'articles';

    public static function withArticles(): void
    {
        self::with('articles');
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

class TagModel
{
    public const string ARTICLES = 'articles';

    public static function withArticles(): void
    {
        self::with(self::ARTICLES);
    }
}
