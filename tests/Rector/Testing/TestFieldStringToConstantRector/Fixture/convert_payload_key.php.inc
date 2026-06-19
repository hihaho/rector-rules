<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class PayloadKeyConvertTest extends TestCase
{
    public function test_create_order(): void
    {
        $this->postJson('/internal/orders', ['id' => 1]);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Order;
use Illuminate\Foundation\Testing\TestCase;

final class PayloadKeyConvertTest extends TestCase
{
    public function test_create_order(): void
    {
        $this->postJson('/internal/orders', [Order::ID => 1]);
    }
}
