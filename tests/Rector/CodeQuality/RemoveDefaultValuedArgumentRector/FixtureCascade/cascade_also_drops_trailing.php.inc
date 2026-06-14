<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// With cascade on, the plain trailing-default drop still applies.
function run(Repository $repository): Repository
{
    return $repository->publish('cache', true);
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// With cascade on, the plain trailing-default drop still applies.
function run(Repository $repository): Repository
{
    return $repository->publish('cache');
}
