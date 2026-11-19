<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\MagicLedger;

function run(MagicLedger $ledger): mixed
{
    return $ledger->undeclared(1, 2, 3);
}
