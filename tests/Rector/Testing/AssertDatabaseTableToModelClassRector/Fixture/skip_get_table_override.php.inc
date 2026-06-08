<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

// (d) Source\Order overrides getTable() → runtime table not statically knowable →
// skip even though the convention name would match 'orders'.
final class SkipGetTableOverrideTest extends TestCase
{
    public function test_order(): void
    {
        $this->assertDatabaseHas('orders', ['number' => 1]);
    }
}
