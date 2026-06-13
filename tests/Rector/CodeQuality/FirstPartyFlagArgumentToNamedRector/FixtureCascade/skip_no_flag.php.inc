<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// Even in cascade mode the run is anchored on a flag: a call with no bare flag
// literal is never touched.
function run(TokenStore $store, ?bool $maybe, int $start, int $end): int
{
    return $store->loadCount($maybe, $start, $end);
}
