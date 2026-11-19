<?php

namespace App;

// @method docblock methods run through __call, which reads its arguments positionally.
use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\MagicLedger;

function run(MagicLedger $ledger): int
{
    return $ledger->phantom(1, 2, 3) + MagicLedger::staticPhantom(1, 2, 3);
}
