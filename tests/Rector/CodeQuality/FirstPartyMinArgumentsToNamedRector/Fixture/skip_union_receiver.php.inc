<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Calculator;
use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\Vendor\ExternalCalculator;

function run(Calculator|ExternalCalculator $calculator): int
{
    return $calculator->sum(1, 2, 3);
}
