<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

// The base declares its own newCollection(). Its body is multi-statement so the
// base itself is not a rewrite candidate — this fixture is about the subclass.
abstract class BaseWithInheritedCollection extends Model
{
    public function newCollection(array $models = []): ArticleCollection
    {
        $models = array_values($models);

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
