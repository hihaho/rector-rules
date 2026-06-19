<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class AbsentSiteSkipTest extends TestCase
{
    public function test_public_webhook_keeps_wire_contract(): void
    {
        $this->postJson('/webhooks/provider', ['id' => 1]);
    }
}
