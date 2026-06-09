<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

trait SuppliesNewCollection
{
    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}

// A trait already supplies newCollection(). A real method beats the attribute, so
// removing the explicit override would hand resolution to the trait, not #[CollectedBy].
final class TraitShadowedModel extends Model
{
    use SuppliesNewCollection;

    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}
