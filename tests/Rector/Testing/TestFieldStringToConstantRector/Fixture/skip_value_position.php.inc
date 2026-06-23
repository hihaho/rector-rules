<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class SkipValuePositionTest extends TestCase
{
    public function test_create_order(): void
    {
        // 'id' is a field name, but in value position — only ArrayItem::$key is ever
        // rewritten, so this is structurally untouchable. 'type' is not a field constant.
        $this->postJson(route('orders.store'), ['type' => 'id']);
    }
}
