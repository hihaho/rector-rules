<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

function run(TokenStore $store): int
{
    return $store->seek(1, strict: true);
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

function run(TokenStore $store): int
{
    return $store->seek(page: 1, strict: true);
}
