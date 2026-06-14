<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\ExternalClient;

function run(ExternalClient $client): bool
{
    return $client->send('payload', true);
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\ExternalClient;

function run(ExternalClient $client): bool
{
    return $client->send('payload');
}
