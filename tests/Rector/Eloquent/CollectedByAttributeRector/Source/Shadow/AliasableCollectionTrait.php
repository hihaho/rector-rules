<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\Shadow;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

trait AliasableCollectionTrait
{
    /**
     * @param array<int, Model> $models
     */
    public function buildCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}
