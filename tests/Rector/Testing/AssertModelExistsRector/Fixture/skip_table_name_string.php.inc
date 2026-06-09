<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

// First argument is a table-name string rather than a ::class fetch — resolveModelClass()
// returns null so the rule skips.
final class TableNameStringTest extends TestCase
{
    public function test_row_exists(): void
    {
        $this->assertDatabaseHas('articles', ['id' => 1]);
    }
}
