<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

trait BuildsCollectionMixedCase
{
    public function buildCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}

// Method names are case-insensitive, so an alias of any casing shadows
// Model::newCollection() once the explicit override is removed. Must skip.
final class AliasMixedCaseModel extends Model
{
    use BuildsCollectionMixedCase {
        buildCollection as NewCollection;
    }

    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}
