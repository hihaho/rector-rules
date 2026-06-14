<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// Naming the leading positional would leave the `...$rest` positional spread after a
// named argument (a PHP fatal), so a call with any unpack is left untouched.
function run(TokenStore $store, array $rest): int
{
    return $store->slice(1, ...$rest, inclusive: true);
}
