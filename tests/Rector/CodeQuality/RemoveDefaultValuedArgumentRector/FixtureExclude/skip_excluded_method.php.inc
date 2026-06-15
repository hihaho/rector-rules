<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// signature() is excluded via exclude_calls — its return is serialized arg-count-
// sensitively, so the all-default (60, 1) must not collapse to ().
function run(Repository $repository): string
{
    return $repository->signature(60, 1);
}
