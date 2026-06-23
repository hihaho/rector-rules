<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class ConvertPatchPayloadTest extends TestCase
{
    public function test_patch_order(): void
    {
        $this->patchJson(route('orders.store'), ['id' => 1]);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Requests\StoreOrderRequest;
use Illuminate\Foundation\Testing\TestCase;

final class ConvertPatchPayloadTest extends TestCase
{
    public function test_patch_order(): void
    {
        $this->patchJson(route('orders.store'), [StoreOrderRequest::ID => 1]);
    }
}
