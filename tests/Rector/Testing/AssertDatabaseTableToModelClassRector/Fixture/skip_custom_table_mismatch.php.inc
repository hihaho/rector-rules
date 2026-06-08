<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

// (c) Source\Post declares protected $table = 'blog_posts', which does not equal
// the literal 'posts' → the model owns a different table → skip.
final class SkipCustomTableMismatchTest extends TestCase
{
    public function test_post(): void
    {
        $this->assertDatabaseHas('posts', ['title' => 'Hello']);
    }
}
