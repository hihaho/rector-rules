<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

function run(): Invoice
{
    return Invoice::issue('INV-1', 2026, true);
}

?>
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

function run(): Invoice
{
    return Invoice::issue(number: 'INV-1', year: 2026, draft: true);
}

?>
