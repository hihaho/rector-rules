<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\ExternalClient;

function run(ExternalClient $client, int $pager): string
{
    return $client->listAction(filter: null, pager: $pager);
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\ExternalClient;

function run(ExternalClient $client, int $pager): string
{
    return $client->listAction(pager: $pager);
}
