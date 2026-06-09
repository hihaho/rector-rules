<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Source\ArticleObserver;
use Illuminate\Database\Eloquent\Model;

// booted() has two statements — the rule only fires for single-statement bodies.
class Article extends Model
{
    protected static function booted(): void
    {
        static::observe(ArticleObserver::class);
        parent::booted();
    }
}
