<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// Cascade names from the left-most flag onward; the positional argument before
// it stays positional.
function run(TokenStore $store, string $url): string
{
    return $store->link($url, true, 'menu');
}

?>
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// Cascade names from the left-most flag onward; the positional argument before
// it stays positional.
function run(TokenStore $store, string $url): string
{
    return $store->link($url, openInSameWindow: true, name: 'menu');
}

?>
