<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

/** @param list<int> $rest */
function run(Invoice $invoice, array $rest): Invoice
{
    return $invoice->addLine('Shipping', ...$rest);
}
