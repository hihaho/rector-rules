<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty;

/**
 * @method int phantom(int $first, int $second, int $third)
 * @method static int staticPhantom(int $first, int $second, int $third)
 * @mixin Calculator
 */
final class MagicLedger
{
    /**
     * @param array<int, mixed> $arguments
     */
    public function __call(string $name, array $arguments): string
    {
        return $name . ':' . count($arguments);
    }

    /**
     * @param array<int, mixed> $arguments
     */
    public static function __callStatic(string $name, array $arguments): string
    {
        return $name . ':' . count($arguments);
    }
}
