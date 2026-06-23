<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class SkipRawStringUrlTest extends TestCase
{
    public function test_create_order(): void
    {
        // arg0 is a raw string URL, not a route() call — no route name to resolve, skip.
        $this->postJson('/internal/orders', ['id' => 1]);
    }
}
