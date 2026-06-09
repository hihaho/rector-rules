<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Article;
use Illuminate\Foundation\Testing\TestCase;

// Multi-key array asserts both existence AND attribute values; converting it to
// assertModelExists would silently drop the attribute check.
final class MultiKeyArrayTest extends TestCase
{
    public function test_article_has_title(): void
    {
        $article = new Article();
        $this->assertDatabaseHas(Article::class, ['id' => $article->id, 'title' => 'Hello']);
    }
}
