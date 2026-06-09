<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Source\ArticleObserver;
use Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Source\BaseArticleModel;

class Article extends BaseArticleModel
{
    protected static function booted(): void
    {
        static::observe(ArticleObserver::class);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Fixture;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Source\ArticleObserver;
use Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Source\BaseArticleModel;

#[ObservedBy(ArticleObserver::class)]
class Article extends BaseArticleModel
{
}
