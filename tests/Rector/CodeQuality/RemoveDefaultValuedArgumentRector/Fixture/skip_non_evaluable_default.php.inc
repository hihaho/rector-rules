<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// Default ['x'] is a non-empty array — not a single droppable constant — so even a
// matching ['x'] argument is left in place.
function run(Repository $repository): Repository
{
    return $repository->report('cache', ['x']);
}
