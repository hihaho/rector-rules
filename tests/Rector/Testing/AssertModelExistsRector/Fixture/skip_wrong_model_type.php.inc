<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Article;
use Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source\Order;
use Illuminate\Foundation\Testing\TestCase;

// $order is typed as Order, not Article — the type guard rejects the mismatch.
final class WrongModelTypeTest extends TestCase
{
    public function test_wrong_type(): void
    {
        $order = new Order();
        $this->assertDatabaseHas(Article::class, ['id' => $order->id]);
    }
}
