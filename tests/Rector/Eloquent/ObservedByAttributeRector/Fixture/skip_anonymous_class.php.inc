<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Source\ArticleObserver;
use Illuminate\Database\Eloquent\Model;

// Anonymous class — getName() returns null, the reflection guard exits.
$obj = new class extends Model {
    protected static function booted(): void
    {
        static::observe(ArticleObserver::class);
    }
};
