<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class SkipNoPayloadTest extends TestCase
{
    public function test_show_order(): void
    {
        // No array argument — nothing to rewrite.
        $this->postJson(route('orders.store'));
    }
}
