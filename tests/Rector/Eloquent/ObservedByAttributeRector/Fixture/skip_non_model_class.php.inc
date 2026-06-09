<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Source\ArticleObserver;

// Not an Eloquent model — the inheritance guard prevents firing on arbitrary classes.
class ArticleService
{
    protected static function booted(): void
    {
        static::observe(ArticleObserver::class);
    }
}
