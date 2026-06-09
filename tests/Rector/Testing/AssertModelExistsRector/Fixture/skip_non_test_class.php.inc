<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Article;

// Not a TestCase subclass — the receiver context guard fails, leaving the call alone.
final class NotATestHelper
{
    public function run(): void
    {
        $article = new Article();
        $this->assertDatabaseHas(Article::class, ['id' => $article->id]);
    }

    private function assertDatabaseHas(string $table, array $data): void {}
}
