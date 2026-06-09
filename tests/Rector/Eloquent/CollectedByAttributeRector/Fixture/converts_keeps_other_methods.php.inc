<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

// Only newCollection() is removed; unrelated methods on the model are preserved.
final class Article extends Model
{
    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }

    public function isPublished(): bool
    {
        return $this->published_at !== null;
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

// Only newCollection() is removed; unrelated methods on the model are preserved.
#[CollectedBy(ArticleCollection::class)]
final class Article extends Model
{
    public function isPublished(): bool
    {
        return $this->published_at !== null;
    }
}
