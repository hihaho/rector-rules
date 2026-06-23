<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Controllers;

/**
 * A controller whose action takes no FormRequest parameter — its route resolves to no
 * request, so the resolver omits it from the map.
 */
class PlainController
{
    /** @return array<string, mixed> */
    public function index(): array
    {
        return [];
    }
}
