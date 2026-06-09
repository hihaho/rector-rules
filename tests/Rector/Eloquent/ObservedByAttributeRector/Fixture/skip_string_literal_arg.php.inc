<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Fixture;

use Illuminate\Database\Eloquent\Model;

// String literal argument — the rule requires a ::class constant fetch.
class Article extends Model
{
    protected static function booted(): void
    {
        static::observe('ArticleObserver');
    }
}
