<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

function run(TokenStore $store): int
{
    return $store->slice(1, 10, inclusive: true);
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

function run(TokenStore $store): int
{
    return $store->slice(start: 1, end: 10, inclusive: true);
}
