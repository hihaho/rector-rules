<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\MagicTokenStore;

// A @method docblock method runs through __call, which reads its arguments
// positionally — a named flag would land on the wrong index.
function run(MagicTokenStore $store, string $platform): string
{
    return $store->resolve($platform, false);
}
