<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

// Nullable return type — $this->getName() returns null for ?Type, so the rule skips.
final class Article extends Model
{
    public function newCollection(array $models = []): ?ArticleCollection
    {
        return new ArticleCollection($models);
    }
}
