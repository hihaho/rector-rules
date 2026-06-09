<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

// Non-final base declares its own newCollection(); the final-gate leaves it alone.
abstract class BaseWithInheritedCollection extends Model
{
    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}

// An ancestor model already declares newCollection(). Removing this override would
// inherit the ancestor's real method, which beats #[CollectedBy] — skip.
final class SubModelWithInheritedCollection extends BaseWithInheritedCollection
{
    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}
