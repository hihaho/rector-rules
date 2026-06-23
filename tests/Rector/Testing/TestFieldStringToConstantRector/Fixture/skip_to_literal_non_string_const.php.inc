<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Requests\StoreOrderRequest;
use Illuminate\Foundation\Testing\TestCase;

final class SkipToLiteralNonStringConstTest extends TestCase
{
    public function test_create_order(): void
    {
        // Public route → to_literal, but MAX_ITEMS is an int constant, not a string field
        // constant — the type/drift guard leaves it untouched rather than writing a bad literal.
        $this->postJson(route('public.orders.store'), [StoreOrderRequest::MAX_ITEMS => 1]);
    }
}
