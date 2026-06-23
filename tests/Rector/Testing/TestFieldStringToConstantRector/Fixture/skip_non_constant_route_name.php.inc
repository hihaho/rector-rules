<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class SkipNonConstantRouteNameTest extends TestCase
{
    public function test_create_order(): void
    {
        // Route name is a variable, not a literal — the rule cannot resolve which route this
        // is, so it leaves the payload alone.
        $routeName = 'orders.store';
        $this->postJson(route($routeName), ['id' => 1]);
    }
}
