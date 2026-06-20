<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Order;
use Illuminate\Foundation\Testing\TestCase;

final class StripConstKeyTest extends TestCase
{
    public function test_public_endpoint_keeps_wire_contract(): void
    {
        $this->getJson('/api/orders/1')->assertJson([Order::ID => 1]);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Order;
use Illuminate\Foundation\Testing\TestCase;

final class StripConstKeyTest extends TestCase
{
    public function test_public_endpoint_keeps_wire_contract(): void
    {
        $this->getJson('/api/orders/1')->assertJson(['id' => 1]);
    }
}
