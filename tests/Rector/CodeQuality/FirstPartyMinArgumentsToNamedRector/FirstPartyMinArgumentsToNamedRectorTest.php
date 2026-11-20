<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use Rector\Application\VersionResolver;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class FirstPartyMinArgumentsToNamedRectorTest extends AbstractRectorTestCase
{
    #[DataProvider('provideData')]
    public function test(string $filePath): void
    {
        // Rector gives code inside a trait a scope from 2.7.0 on; before that the
        // rule cannot resolve any call there.
        if (str_contains($filePath, '_trait_') && version_compare(VersionResolver::PACKAGE_VERSION, '2.7.0', '<')) {
            self::markTestSkipped('Needs Rector 2.7.0 or later to analyse code inside a trait.');
        }

        $this->doTestFile($filePath);
    }

    public static function provideData(): Iterator
    {
        return self::yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
