<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Article;
use Illuminate\Foundation\Testing\TestCase;

// Article::ARTICLE_KEY resolves to 'article_id', not 'id' — isIdKey() rejects it.
final class NonIdConstantTest extends TestCase
{
    public function test_article_by_article_key(): void
    {
        $article = new Article();
        $this->assertDatabaseHas(Article::class, [Article::ARTICLE_KEY => $article->id]);
    }
}
