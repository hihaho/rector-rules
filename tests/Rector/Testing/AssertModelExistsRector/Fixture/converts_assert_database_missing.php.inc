<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Article;
use Illuminate\Foundation\Testing\TestCase;

final class AssertDatabaseMissingTest extends TestCase
{
    public function test_article_is_gone(): void
    {
        $article = new Article();
        $this->assertDatabaseMissing(Article::class, ['id' => $article->id]);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Article;
use Illuminate\Foundation\Testing\TestCase;

final class AssertDatabaseMissingTest extends TestCase
{
    public function test_article_is_gone(): void
    {
        $article = new Article();
        $this->assertModelMissing($article);
    }
}
