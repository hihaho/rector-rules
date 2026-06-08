<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class AssertDatabaseHasConvertTest extends TestCase
{
    public function test_user_row_exists(): void
    {
        $this->assertDatabaseHas('users', ['email' => 'taylor@example.com']);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source\User;
use Illuminate\Foundation\Testing\TestCase;

final class AssertDatabaseHasConvertTest extends TestCase
{
    public function test_user_row_exists(): void
    {
        $this->assertDatabaseHas(User::class, ['email' => 'taylor@example.com']);
    }
}
