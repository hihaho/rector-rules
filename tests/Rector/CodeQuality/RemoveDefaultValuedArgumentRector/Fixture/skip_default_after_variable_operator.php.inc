<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// The operator is a variable — not provably at its default — so it counts as an
// override and the trailing default count stays put.
function run(Repository $repository, string $operator): Repository
{
    return $repository->relate('posts', $operator, 1);
}
