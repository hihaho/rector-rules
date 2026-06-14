<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Routing\MiddlewareStringToClassRector;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class MiddlewareStringToClassThrottleTest extends AbstractRectorTestCase
{
    #[DataProvider('provideData')]
    public function test(string $filePath): void
    {
        $this->doTestFile($filePath);
    }

    public static function provideData(): Iterator
    {
        return self::yieldFilesFromDirectory(__DIR__ . '/FixtureThrottle');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/throttle_rule.php';
    }
}
