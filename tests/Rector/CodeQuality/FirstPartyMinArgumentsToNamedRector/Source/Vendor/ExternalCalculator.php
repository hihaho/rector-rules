<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\Vendor;

final class ExternalCalculator
{
    public function sum(int $first, int $second, int $third): int
    {
        return $first + $second + $third;
    }
}
