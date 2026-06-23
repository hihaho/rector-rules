<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Controllers;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Requests\StoreOrderRequest;

/**
 * An invokable controller — a bare `Controller::class` route action resolves to its
 * `__invoke` method, whose FormRequest parameter the resolver reflects.
 */
class InvokableController
{
    /** @return array<string, mixed> */
    public function __invoke(StoreOrderRequest $request): array
    {
        return ['validated' => $request->validated()];
    }
}
