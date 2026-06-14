<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// Default is null; passing false must NOT drop — strict type+value equality.
function run(Repository $repository): Repository
{
    return $repository->flag('cache', false);
}
