<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class ValueDriftSkipTest extends TestCase
{
    public function test_create_order(): void
    {
        $this->postJson('/internal/orders', ['identifier' => 1]);
    }
}
