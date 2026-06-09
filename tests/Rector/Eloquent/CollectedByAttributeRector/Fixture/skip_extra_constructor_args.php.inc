<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

// Constructor receives more than one argument — count($args) !== 1, rule skips.
class Article extends Model
{
    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models, true);
    }
}
