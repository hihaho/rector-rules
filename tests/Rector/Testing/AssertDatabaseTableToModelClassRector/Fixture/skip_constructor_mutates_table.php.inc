<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

// Source\Tenant's table matches by convention, but its constructor mutates the table
// at runtime — construction is not inert, so the string is left untouched.
final class SkipConstructorMutatesTableTest extends TestCase
{
    public function test_tenant(): void
    {
        $this->assertDatabaseHas('tenants', ['id' => 1]);
    }
}
