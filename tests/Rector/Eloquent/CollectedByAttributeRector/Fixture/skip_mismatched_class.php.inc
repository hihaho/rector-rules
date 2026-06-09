<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\CommentCollection;
use Illuminate\Database\Eloquent\Model;

// Return type (ArticleCollection) differs from constructed class (CommentCollection) — rule skips.
final class Article extends Model
{
    public function newCollection(array $models = []): ArticleCollection
    {
        return new CommentCollection($models);
    }
}
