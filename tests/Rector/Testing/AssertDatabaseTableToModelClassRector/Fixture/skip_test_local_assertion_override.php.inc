<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use PHPUnit\Framework\TestCase;

// A TestCase that declares its OWN assertDatabaseHas is calling that method, not
// Laravel's database assertion — its first argument must not be rewritten.
final class SkipTestLocalAssertionOverrideTest extends TestCase
{
    public function assertDatabaseHas(string $table, array $data): void
    {
    }

    public function test_users(): void
    {
        $this->assertDatabaseHas('users', ['id' => 1]);
    }
}
