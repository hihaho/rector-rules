<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\MultilineCallArgumentsRector;

use Hihaho\RectorRules\Rector\CodeQuality\MultilineCallArgumentsRector;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\DataProvider;
use Rector\Testing\PHPUnit\AbstractLazyTestCase;

/**
 * Extends Rector's lazy test base for its scoper autoload; see ConfigureManifestTest.
 */
final class ConfigureMinArgumentsTest extends AbstractLazyTestCase
{
    #[DataProvider('provideInvalidMinimum')]
    public function test_invalid_minimum_throws(mixed $minimum): void
    {
        $this->expectException(InvalidArgumentException::class);

        (new MultilineCallArgumentsRector())->configure([MultilineCallArgumentsRector::MIN_ARGUMENTS => $minimum]);
    }

    /**
     * @return iterable<string, array{mixed}>
     */
    public static function provideInvalidMinimum(): iterable
    {
        yield 'zero' => [0];
        yield 'numeric string' => ['2'];
    }
}
