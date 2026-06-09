<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Source\ArticleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

// Already has #[ObservedBy] — idempotency guard prevents a second attribute.
#[ObservedBy(ArticleObserver::class)]
class Article extends Model
{
    protected static function booted(): void
    {
        static::observe(ArticleObserver::class);
    }
}
