<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

function run(TokenStore $store, string $platform, string $method): ?string
{
    return $store->$method($platform, false);
}
