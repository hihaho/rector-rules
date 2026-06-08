<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

// (g) A non-test class exposing its own assertDatabaseHas(string, …) → the
// test-context gate fails, so the unrelated method is left alone.
final class NotATestHelper
{
    public function assertDatabaseHas(string $table, array $data): void
    {
    }

    public function run(): void
    {
        $this->assertDatabaseHas('users', ['email' => 'x@example.com']);
    }
}
