<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

function run(TokenStore $store, string $platform, bool $inherit): ?string
{
    return $store->resolve($platform, $inherit);
}
