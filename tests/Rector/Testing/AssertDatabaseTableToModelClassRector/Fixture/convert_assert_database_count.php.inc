<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class AssertDatabaseCountConvertTest extends TestCase
{
    public function test_user_count(): void
    {
        $this->assertDatabaseCount('users', 2);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source\User;
use Illuminate\Foundation\Testing\TestCase;

final class AssertDatabaseCountConvertTest extends TestCase
{
    public function test_user_count(): void
    {
        $this->assertDatabaseCount(User::class, 2);
    }
}
