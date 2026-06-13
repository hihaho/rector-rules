<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

function run(?TokenStore $store, string $platform): ?string
{
    return $store->resolve($platform, false);
}

?>
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

function run(?TokenStore $store, string $platform): ?string
{
    return $store->resolve($platform, inherit: false);
}

?>
