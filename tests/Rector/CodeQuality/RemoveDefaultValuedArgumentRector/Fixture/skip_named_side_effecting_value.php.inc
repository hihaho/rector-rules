<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

function alwaysNull(): null
{
    return null;
}

// The argument's type resolves to null (the default), but it is a function call, not a
// literal — dropping it would remove the call's evaluation, so it is left in place.
function run(Repository $repository): Repository
{
    return $repository->cache('cache', ttl: alwaysNull());
}
