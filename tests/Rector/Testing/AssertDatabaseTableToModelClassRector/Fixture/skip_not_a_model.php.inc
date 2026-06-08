<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

// (b) `things` resolves to Source\Thing by name, but it is not an Eloquent model.
final class SkipNotAModelTest extends TestCase
{
    public function test_thing(): void
    {
        $this->assertDatabaseHas('things', ['id' => 1]);
    }
}
