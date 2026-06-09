<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Article;
use Illuminate\Foundation\Testing\TestCase;

// Three args: third argument is the connection name — dropping it would silently
// switch connections, so the rule skips the call entirely.
final class ThreeArgsTest extends TestCase
{
    public function test_article_on_secondary(): void
    {
        $article = new Article();
        $this->assertDatabaseHas(Article::class, ['id' => $article->id], 'secondary');
    }
}
