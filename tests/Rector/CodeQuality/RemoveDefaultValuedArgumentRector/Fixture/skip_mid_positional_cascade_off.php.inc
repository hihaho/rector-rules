<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// [] equals the default, but it is followed by a positional argument; without
// cascade_drop the rule cannot remove it (would reorder), so no change.
function run(Repository $repository, string $relationship): Repository
{
    return $repository->attach('member', [], $relationship);
}
