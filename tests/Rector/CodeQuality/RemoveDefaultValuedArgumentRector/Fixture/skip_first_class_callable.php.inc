<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

function run(Repository $repository): callable
{
    return $repository->resolve(...);
}
