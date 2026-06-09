<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Article;
use Illuminate\Foundation\Testing\TestCase;

// Value is $article->uuid, not $article->id — the pattern does not match.
final class NonIdPropertyTest extends TestCase
{
    public function test_article_by_uuid(): void
    {
        $article = new Article();
        $this->assertDatabaseHas(Article::class, ['id' => $article->uuid]);
    }
}
