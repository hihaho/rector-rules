<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

// Source\Account's table matches 'accounts', but it declares a non-default
// connection — converting would retarget the assertion's connection → skip.
final class SkipModelWithConnectionTest extends TestCase
{
    public function test_account(): void
    {
        $this->assertDatabaseHas('accounts', ['id' => 1]);
    }
}
