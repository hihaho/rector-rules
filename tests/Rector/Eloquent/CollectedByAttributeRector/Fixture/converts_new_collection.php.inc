<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

final class Article extends Model
{
    /** @param self[] $models */
    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

#[CollectedBy(ArticleCollection::class)]
final class Article extends Model
{
}
