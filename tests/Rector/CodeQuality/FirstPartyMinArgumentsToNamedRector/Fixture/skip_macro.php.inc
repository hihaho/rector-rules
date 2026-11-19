<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\MacroLedger;

function run(MacroLedger $ledger): mixed
{
    MacroLedger::macro('spread', fn (int $first, int $second, int $third): int => $first + $second + $third);

    return $ledger->spread(1, 2, 3);
}
