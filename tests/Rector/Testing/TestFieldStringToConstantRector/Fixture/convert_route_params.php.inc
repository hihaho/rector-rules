<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class ConvertRouteParamsTest extends TestCase
{
    public function test_create_order(): void
    {
        // The route() params array is nested inside the route() call, not a direct argument
        // of postJson — so it is never mistaken for the payload. Only ['id' => 1] is rewritten.
        $this->postJson(route('orders.store', ['tenant' => 1]), ['id' => 1]);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Requests\StoreOrderRequest;
use Illuminate\Foundation\Testing\TestCase;

final class ConvertRouteParamsTest extends TestCase
{
    public function test_create_order(): void
    {
        // The route() params array is nested inside the route() call, not a direct argument
        // of postJson — so it is never mistaken for the payload. Only ['id' => 1] is rewritten.
        $this->postJson(route('orders.store', ['tenant' => 1]), [StoreOrderRequest::ID => 1]);
    }
}
