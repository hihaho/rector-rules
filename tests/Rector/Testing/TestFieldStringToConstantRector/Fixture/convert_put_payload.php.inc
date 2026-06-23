<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class ConvertPutPayloadTest extends TestCase
{
    public function test_update_order(): void
    {
        $this->putJson(route('orders.store'), ['id' => 1]);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Requests\StoreOrderRequest;
use Illuminate\Foundation\Testing\TestCase;

final class ConvertPutPayloadTest extends TestCase
{
    public function test_update_order(): void
    {
        $this->putJson(route('orders.store'), [StoreOrderRequest::ID => 1]);
    }
}
