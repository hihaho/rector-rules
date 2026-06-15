<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// Without exclude_calls, an all-default call collapses — correct value-wise, but it
// would change a serialized signature. See FixtureExclude for the opt-out.
function run(Repository $repository): string
{
    return $repository->signature(60, 1);
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// Without exclude_calls, an all-default call collapses — correct value-wise, but it
// would change a serialized signature. See FixtureExclude for the opt-out.
function run(Repository $repository): string
{
    return $repository->signature();
}
