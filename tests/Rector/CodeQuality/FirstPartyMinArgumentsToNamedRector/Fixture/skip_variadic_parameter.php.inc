<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

function run(Invoice $invoice): string
{
    return $invoice->tag('priority', 'red', 'blue');
}
