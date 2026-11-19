<?php

namespace App;

// Facade static calls go through __callStatic, so even a native static method on a facade is left alone.
use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\InvoiceFacade;

function run(): string
{
    InvoiceFacade::addLine('Shipping', 500, 'flat rate');

    return InvoiceFacade::format('INV-1', 2026, true);
}
