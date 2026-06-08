<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

// A base test case overrides the database helpers the assertion dispatches to, so the
// model-class form and the string form could resolve differently inside the override
// → the call is left untouched.
abstract class OverridesDatabaseHelpersTestCase extends TestCase
{
    protected function getTable($table)
    {
        return $table;
    }

    protected function getConnection($connection = null, $table = null)
    {
        return null;
    }
}

final class SkipOverridesDbHelpersTest extends OverridesDatabaseHelpersTestCase
{
    public function test_users(): void
    {
        $this->assertDatabaseHas('users', ['id' => 1]);
    }
}
