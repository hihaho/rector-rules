<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

// (e) Source\Category's convention table is 'categories'; the literal 'category'
// (a non-conventional spelling) does not match → skip rather than mis-target.
final class SkipConventionTableMismatchTest extends TestCase
{
    public function test_category(): void
    {
        $this->assertDatabaseHas('category', ['name' => 'Books']);
    }
}
