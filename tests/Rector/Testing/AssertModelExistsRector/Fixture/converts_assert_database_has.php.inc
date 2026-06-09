<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Article;
use Illuminate\Foundation\Testing\TestCase;

final class AssertDatabaseHasTest extends TestCase
{
    public function test_article_exists(): void
    {
        $article = new Article();
        $this->assertDatabaseHas(Article::class, ['id' => $article->id]);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Article;
use Illuminate\Foundation\Testing\TestCase;

final class AssertDatabaseHasTest extends TestCase
{
    public function test_article_exists(): void
    {
        $article = new Article();
        $this->assertModelExists($article);
    }
}
