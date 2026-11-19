<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

function run(Invoice $invoice): int
{
    return $invoice->total(100, 21);
}

?>
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

function run(Invoice $invoice): int
{
    return $invoice->total(net: 100, tax: 21);
}

?>
