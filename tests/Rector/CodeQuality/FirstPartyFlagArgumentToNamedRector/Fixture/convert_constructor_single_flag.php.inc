<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

function run(string $platform): TokenStore
{
    return new TokenStore($platform, false);
}

?>
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

function run(string $platform): TokenStore
{
    return new TokenStore($platform, inherit: false);
}

?>
