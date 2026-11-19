<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\Vendor\ExternalCalculator;

function run(ExternalCalculator $calculator): int
{
    return $calculator->sum(1, 2, 3);
}
