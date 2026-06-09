<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Article;
use Illuminate\Foundation\Testing\TestCase;

final class ClassConstantKeyTest extends TestCase
{
    public function test_article_exists_via_constant(): void
    {
        $article = new Article();
        $this->assertDatabaseHas(Article::class, [Article::ID => $article->id]);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Article;
use Illuminate\Foundation\Testing\TestCase;

final class ClassConstantKeyTest extends TestCase
{
    public function test_article_exists_via_constant(): void
    {
        $article = new Article();
        $this->assertModelExists($article);
    }
}
