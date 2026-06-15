<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// Guard B applies to the cascade path too: the overridden '=' protects the trailing
// default count from being dropped.
function run(Repository $repository): Repository
{
    return $repository->relate('posts', '=', 1);
}
