<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

class CategoryModel
{
    public const string ARTICLES = 'articles';

    public static function withArticles(): void
    {
        static::with('articles');
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

class CategoryModel
{
    public const string ARTICLES = 'articles';

    public static function withArticles(): void
    {
        static::with(static::ARTICLES);
    }
}
