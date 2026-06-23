<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Requests\StoreOrderRequest;
use Illuminate\Foundation\Testing\TestCase;

final class SkipConstAlreadyCorrectTest extends TestCase
{
    public function test_create_order(): void
    {
        // Internal route, key is already the constant — to_const only rewrites string keys,
        // so this is idempotent and left as-is.
        $this->postJson(route('orders.store'), [StoreOrderRequest::ID => 1]);
    }
}
