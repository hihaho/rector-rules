<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

function run(TokenStore $store, string $platform): void
{
    $store->configure($platform, false, isBoolean: true);
}

?>
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

function run(TokenStore $store, string $platform): void
{
    $store->configure($platform, setDefaultNullValue: false, isBoolean: true);
}

?>
