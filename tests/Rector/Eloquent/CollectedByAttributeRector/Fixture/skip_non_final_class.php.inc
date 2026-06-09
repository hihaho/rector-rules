<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

// Non-final: a subclass would inherit newCollection() but not the #[CollectedBy]
// attribute, so rewriting would silently strip the custom collection from it.
class Article extends Model
{
    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}
