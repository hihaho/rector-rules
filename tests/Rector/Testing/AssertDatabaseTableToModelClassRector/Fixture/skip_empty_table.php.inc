<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

// Source\Token has protected $table = '' — Eloquent treats that as the real table
// name (not a convention fallback), so it does not equal 'tokens' → skip.
final class SkipEmptyTableTest extends TestCase
{
    public function test_token(): void
    {
        $this->assertDatabaseHas('tokens', ['id' => 1]);
    }
}
