<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Source\ArticleObserver;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected static function booted(): void
    {
        self::observe(ArticleObserver::class);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Fixture;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Source\ArticleObserver;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(ArticleObserver::class)]
class Article extends Model
{
}
