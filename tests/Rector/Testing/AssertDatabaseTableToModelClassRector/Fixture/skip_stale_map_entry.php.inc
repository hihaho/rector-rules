<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

// A map entry points 'ghosts' at Source\Post, but Post's table is 'blog_posts' —
// verification fails, so the stale entry is skipped rather than mis-targeted.
final class SkipStaleMapEntryTest extends TestCase
{
    public function test_ghosts(): void
    {
        $this->assertDatabaseHas('ghosts', ['id' => 1]);
    }
}
