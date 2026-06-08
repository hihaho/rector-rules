<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

// Source\Workspace carries an initialize{Trait}() hook that mutates the table during
// Model::__construct — not statically inert, so the string is left untouched.
final class SkipTraitInitializerTest extends TestCase
{
    public function test_workspace(): void
    {
        $this->assertDatabaseHas('workspaces', ['id' => 1]);
    }
}
