<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// force=false overrides the `true` default, so the trailing null ttl is no longer
// dropped — the call is already non-minimal and the default may be load-bearing.
function run(Repository $repository): Repository
{
    return $repository->configure('cache', false, null);
}
