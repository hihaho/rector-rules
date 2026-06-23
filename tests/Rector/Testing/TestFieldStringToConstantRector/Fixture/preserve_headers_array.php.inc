<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class PreserveHeadersArrayTest extends TestCase
{
    public function test_create_order(): void
    {
        // Laravel's signature is ($uri, $data, $headers): the FIRST array is the payload. The
        // headers array is second and left untouched — even though its key is a field name.
        $this->postJson(route('orders.store'), ['id' => 1], ['name' => 'header-value']);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Requests\StoreOrderRequest;
use Illuminate\Foundation\Testing\TestCase;

final class PreserveHeadersArrayTest extends TestCase
{
    public function test_create_order(): void
    {
        // Laravel's signature is ($uri, $data, $headers): the FIRST array is the payload. The
        // headers array is second and left untouched — even though its key is a field name.
        $this->postJson(route('orders.store'), [StoreOrderRequest::ID => 1], ['name' => 'header-value']);
    }
}
