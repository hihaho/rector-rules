<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// First-class callable on a method: no trailing flag argument to name, and
// CallLike::getArgs() asserts against being called on one. Must skip, not crash.
function run(TokenStore $store): \Closure
{
    return $store->resolve(...);
}
