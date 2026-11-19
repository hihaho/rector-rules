<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

function run(): Invoice
{
    return new Invoice('INV-1', ...['year' => 2026, 'draft' => false]);
}
