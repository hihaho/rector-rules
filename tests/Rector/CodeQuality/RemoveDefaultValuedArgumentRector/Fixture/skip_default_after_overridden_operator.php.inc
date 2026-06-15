<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// count 1 equals its default, but the operator '=' overrides the '>=' default — the
// count is the operand of that comparison, so dropping it would leave '=' dangling.
function run(Repository $repository): Repository
{
    return $repository->relate('posts', '=', 1);
}
