<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class ValuePositionSkipTest extends TestCase
{
    public function test_field_name_in_value_position_is_left_alone(): void
    {
        $this->postJson('/internal/orders', ['type' => 'id']);
    }
}
