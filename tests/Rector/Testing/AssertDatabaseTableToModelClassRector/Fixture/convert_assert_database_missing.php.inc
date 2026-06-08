<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class AssertDatabaseMissingConvertTest extends TestCase
{
    public function test_user_row_absent(): void
    {
        $this->assertDatabaseMissing('users', ['email' => 'gone@example.com']);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source\User;
use Illuminate\Foundation\Testing\TestCase;

final class AssertDatabaseMissingConvertTest extends TestCase
{
    public function test_user_row_absent(): void
    {
        $this->assertDatabaseMissing(User::class, ['email' => 'gone@example.com']);
    }
}
