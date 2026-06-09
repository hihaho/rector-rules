<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Article;
use Illuminate\Foundation\Testing\TestCase;

// Already in assertModelExists form — method name is not in the map, no change.
final class AlreadyConvertedTest extends TestCase
{
    public function test_article_exists(): void
    {
        $article = new Article();
        $this->assertModelExists($article);
    }
}
