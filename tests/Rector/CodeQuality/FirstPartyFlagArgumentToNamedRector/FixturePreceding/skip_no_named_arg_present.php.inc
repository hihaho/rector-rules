<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// All-positional call: nothing is already named, so there is nothing to anchor the
// preceding-positional naming on.
function run(TokenStore $store): int
{
    return $store->slice(1, 10);
}
