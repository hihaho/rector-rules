<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Requests\StoreOrderRequest;
use Illuminate\Foundation\Testing\TestCase;

final class StripPublicConstTest extends TestCase
{
    public function test_create_order(): void
    {
        $this->postJson(route('public.orders.store'), [StoreOrderRequest::ID => 1]);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Requests\StoreOrderRequest;
use Illuminate\Foundation\Testing\TestCase;

final class StripPublicConstTest extends TestCase
{
    public function test_create_order(): void
    {
        $this->postJson(route('public.orders.store'), ['id' => 1]);
    }
}
