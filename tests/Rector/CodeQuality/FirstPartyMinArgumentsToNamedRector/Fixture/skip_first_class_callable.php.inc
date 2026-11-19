<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

function run(Invoice $invoice): \Closure
{
    return $invoice->addLine(...);
}
