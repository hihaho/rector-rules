<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// Cascade: the flag is first, so naming it forces the trailing positional
// arguments to be named too.
function run(TokenStore $store, int $start, int $end): int
{
    return $store->loadCount(true, $start, $end);
}

?>
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// Cascade: the flag is first, so naming it forces the trailing positional
// arguments to be named too.
function run(TokenStore $store, int $start, int $end): int
{
    return $store->loadCount(hasStarted: true, start: $start, end: $end);
}

?>
