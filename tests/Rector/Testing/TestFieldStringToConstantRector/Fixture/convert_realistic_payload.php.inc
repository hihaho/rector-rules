<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

final class RealisticPayloadConvertTest extends TestCase
{
    public function test_create_resource(): void
    {
        $this->postJson('/internal/widgets', [
            'player_url' => 'https://example.test/p/1',
            'account_id' => 7,
            'id' => 1,
        ]);
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Widget;
use Illuminate\Foundation\Testing\TestCase;

final class RealisticPayloadConvertTest extends TestCase
{
    public function test_create_resource(): void
    {
        $this->postJson('/internal/widgets', [
            Widget::PLAYER_URL => 'https://example.test/p/1',
            Widget::ACCOUNT_ID => 7,
            'id' => 1,
        ]);
    }
}
