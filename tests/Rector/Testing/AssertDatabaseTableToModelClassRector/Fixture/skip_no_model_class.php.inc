<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

// (a) No model resolves from the table name → leave the string untouched.
final class SkipNoModelClassTest extends TestCase
{
    public function test_widget(): void
    {
        $this->assertDatabaseHas('widgets', ['name' => 'gadget']);
    }
}
