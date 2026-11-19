<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

function run(Invoice $invoice): Invoice
{
    return $invoice->addLine('Shipping', 500, memo: 'flat rate');
}

?>
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

function run(Invoice $invoice): Invoice
{
    return $invoice->addLine(label: 'Shipping', amount: 500, memo: 'flat rate');
}

?>
