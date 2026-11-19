<?php

namespace App;

// recalculate() is protected; from outside the class the call would hit __call (or fail).
use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

function run(Invoice $invoice): mixed
{
    return $invoice->recalculate(100, 21, 5);
}
