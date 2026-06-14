<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Routing\MiddlewareStringToClassRector;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

/**
 * Exercises the DEFAULT convert-set (empty configuration): `auth` and `guest` are
 * skipped — they are the aliases an app most often remaps to a logic-bearing subclass —
 * while the behaviour-safe aliases still convert.
 */
final class MiddlewareStringToClassDefaultAliasesTest extends AbstractRectorTestCase
{
    #[DataProvider('provideData')]
    public function test(string $filePath): void
    {
        $this->doTestFile($filePath);
    }

    public static function provideData(): Iterator
    {
        return self::yieldFilesFromDirectory(__DIR__ . '/FixtureDefaultAliases');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/default_aliases_rule.php';
    }
}
