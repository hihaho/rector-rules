<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// Trailing-safe only: the bare flag is first, followed by positional arguments.
// Naming it would force naming $start/$end too (a cascade), which this rule
// deliberately does not do — so the call is left untouched.
function run(TokenStore $store, int $start, int $end): int
{
    return $store->loadCount(true, $start, $end);
}
