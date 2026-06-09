<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// A first-class callable in the same file must be left alone while a real flag
// call still gets named — proves the guard is narrow.
function run(TokenStore $store, string $platform): array
{
    $ref = $store->resolve(...);

    return [$ref, $store->resolve($platform, false)];
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// A first-class callable in the same file must be left alone while a real flag
// call still gets named — proves the guard is narrow.
function run(TokenStore $store, string $platform): array
{
    $ref = $store->resolve(...);

    return [$ref, $store->resolve($platform, inherit: false)];
}
