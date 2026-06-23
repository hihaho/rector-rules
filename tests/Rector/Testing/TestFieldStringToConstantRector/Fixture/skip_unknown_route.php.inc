<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class SkipUnknownRouteTest extends TestCase
{
    public function test_create_order(): void
    {
        // Route name is not in the resolver's map (no such route) — default-safe, left alone.
        $this->postJson(route('nope.missing'), ['id' => 1]);
    }
}
