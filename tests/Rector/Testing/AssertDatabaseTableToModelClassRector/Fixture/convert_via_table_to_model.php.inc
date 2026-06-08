<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class TableToModelMapConvertTest extends TestCase
{
    public function test_legacy_people(): void
    {
        $this->assertDatabaseHas('legacy_people', ['name' => 'Ada']);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source\Person;
use Illuminate\Foundation\Testing\TestCase;

final class TableToModelMapConvertTest extends TestCase
{
    public function test_legacy_people(): void
    {
        $this->assertDatabaseHas(Person::class, ['name' => 'Ada']);
    }
}
