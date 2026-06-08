<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source\User;
use Illuminate\Foundation\Testing\TestCase;

// (f) First argument is not a plain string literal → never touched.
final class SkipNonLiteralFirstArgTest extends TestCase
{
    public function test_variants(): void
    {
        $table = 'users';

        $this->assertDatabaseHas($table, []);
        $this->assertDatabaseHas('us' . 'ers', []);
        $this->assertDatabaseHas(User::class, []);
    }
}
