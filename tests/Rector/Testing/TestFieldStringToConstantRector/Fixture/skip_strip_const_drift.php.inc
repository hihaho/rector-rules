<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Widget;
use Illuminate\Foundation\Testing\TestCase;

final class StripConstDriftSkipTest extends TestCase
{
    public function test_drifted_const_left_alone(): void
    {
        $this->getJson('/api/widgets/1')->assertJson([Widget::PLAYER_URL => 1]);
    }
}
