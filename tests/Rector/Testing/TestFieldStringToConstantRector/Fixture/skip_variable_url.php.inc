<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class SkipVariableUrlTest extends TestCase
{
    public function test_create_order(): void
    {
        // arg0 is a variable, not a literal route() call — variable dataflow is out of
        // scope for v1, so this is left untouched.
        $url = route('orders.store');
        $this->postJson($url, ['id' => 1]);
    }
}
