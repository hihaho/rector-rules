<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Article;
use Illuminate\Foundation\Testing\TestCase;

// Key is 'name', not 'id' — assertModelExists checks the primary key, not an arbitrary column.
final class NonIdKeyTest extends TestCase
{
    public function test_article_by_name(): void
    {
        $this->assertDatabaseHas(Article::class, ['name' => 'foo']);
    }
}
