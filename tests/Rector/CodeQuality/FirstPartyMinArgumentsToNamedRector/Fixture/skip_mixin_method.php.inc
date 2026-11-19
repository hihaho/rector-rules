<?php

namespace App;

// sum() is a native method of the @mixin target, but the call reaches it via MagicLedger::__call.
use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\MagicLedger;

function run(MagicLedger $ledger): int
{
    return $ledger->sum(1, 2, 3);
}
