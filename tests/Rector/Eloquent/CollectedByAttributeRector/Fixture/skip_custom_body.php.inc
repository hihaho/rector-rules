<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

// newCollection() has extra logic — multi-statement body is not transformed.
final class Article extends Model
{
    public function newCollection(array $models = []): ArticleCollection
    {
        $filtered = array_filter($models);

        return new ArticleCollection($filtered);
    }
}
