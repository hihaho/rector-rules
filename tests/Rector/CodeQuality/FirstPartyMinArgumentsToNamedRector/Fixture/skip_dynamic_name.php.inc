<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

/** @param class-string<Invoice> $class */
function run(Invoice $invoice, string $method, string $class): mixed
{
    $invoice->$method('Shipping', 500, 'flat rate');

    return new $class('INV-1', 2026, false);
}
