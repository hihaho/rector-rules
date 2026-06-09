<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// PHP method names are case-insensitive, so a mixed-case call still resolves to
// the declared parameter name.
function run(TokenStore $store, string $platform): ?string
{
    return $store->Resolve($platform, false);
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// PHP method names are case-insensitive, so a mixed-case call still resolves to
// the declared parameter name.
function run(TokenStore $store, string $platform): ?string
{
    return $store->Resolve($platform, inherit: false);
}
