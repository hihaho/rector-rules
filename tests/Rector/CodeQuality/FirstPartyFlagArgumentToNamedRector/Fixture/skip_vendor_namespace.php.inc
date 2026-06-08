<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\Vendor\ExternalClient;

function dispatch(ExternalClient $client, string $payload): bool
{
    return $client->send($payload, true);
}
