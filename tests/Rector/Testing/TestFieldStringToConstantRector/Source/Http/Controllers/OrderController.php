<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Controllers;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Requests\StoreOrderRequest;

/**
 * Test double controller. Its action type-hints the FormRequest the resolver reflects
 * to map a route to its request constants. The body uses the parameter so the auto-fix
 * deadcode pass keeps the signature intact.
 */
class OrderController
{
    /** @return array<string, mixed> */
    public function store(StoreOrderRequest $request): array
    {
        return ['validated' => $request->validated()];
    }
}
