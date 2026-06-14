<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\Vendor\ExternalClient;

// Vendor callee: naming a positional couples to the vendor parameter name, so the
// preceding-positional pass is refused outside the first-party namespace.
function run(ExternalClient $client): bool
{
    return $client->send('payload', async: true);
}
