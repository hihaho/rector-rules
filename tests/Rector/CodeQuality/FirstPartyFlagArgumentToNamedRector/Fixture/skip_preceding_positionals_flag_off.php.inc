<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// Default config: name_preceding_positionals is off, so the leading positional 1 is
// left positional even though a later argument is named.
function run(TokenStore $store): int
{
    return $store->seek(1, strict: true);
}
