<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

// Missing return type declaration — $returnTypeFqcn is null, rule skips.
class Article extends Model
{
    public function newCollection(array $models = [])
    {
        return new ArticleCollection($models);
    }
}
