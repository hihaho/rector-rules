<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use PHPUnit\Framework\TestCase;

// An intermediate base test case declares its own assertDatabaseHas; the child's
// call resolves to that inherited custom method, not Laravel's assertion → skip.
abstract class CustomBaseTestCase extends TestCase
{
    public function assertDatabaseHas(string $table, array $data): void
    {
    }
}

final class SkipInheritedAssertionOverrideTest extends CustomBaseTestCase
{
    public function test_users(): void
    {
        $this->assertDatabaseHas('users', ['id' => 1]);
    }
}
