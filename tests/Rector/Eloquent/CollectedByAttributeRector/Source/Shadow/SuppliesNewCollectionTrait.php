<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\Shadow;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

trait SuppliesNewCollectionTrait
{
    /**
     * @param array<int, Model> $models
     */
    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}
