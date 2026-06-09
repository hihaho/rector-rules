<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

// Anonymous class — isAnonymous() guard exits.
$obj = new class extends Model {
    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
};
