<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

// Laravel 13 resolves #[CollectedBy] up the parent chain, so a subclass inherits
// the attribute just as it inherited the method — the rewrite is safe even though
// the class is not final.
class Article extends Model
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

// Laravel 13 resolves #[CollectedBy] up the parent chain, so a subclass inherits
// the attribute just as it inherited the method — the rewrite is safe even though
// the class is not final.
#[CollectedBy(ArticleCollection::class)]
class Article extends Model
{
}
