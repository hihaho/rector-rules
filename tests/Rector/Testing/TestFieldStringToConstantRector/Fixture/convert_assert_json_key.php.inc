<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class AssertJsonKeyConvertTest extends TestCase
{
    public function test_response_exposes_id(): void
    {
        $this->getJson('/internal/orders/1')->assertJson(['id' => 1]);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Order;
use Illuminate\Foundation\Testing\TestCase;

final class AssertJsonKeyConvertTest extends TestCase
{
    public function test_response_exposes_id(): void
    {
        $this->getJson('/internal/orders/1')->assertJson([Order::ID => 1]);
    }
}
