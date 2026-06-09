<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

trait BuildsCollection
{
    public function buildCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}

// A trait method aliased to newCollection() supplies the method once the explicit
// override is removed, beating #[CollectedBy]. Must skip.
final class AliasShadowedModel extends Model
{
    use BuildsCollection {
        buildCollection as newCollection;
    }

    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}
