<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// -1 parses as a unary expression, not a bare scalar; it must still match a -1 default.
function run(Repository $repository, int $current): Repository
{
    return $repository->step($current, -1);
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// -1 parses as a unary expression, not a bare scalar; it must still match a -1 default.
function run(Repository $repository, int $current): Repository
{
    return $repository->step($current);
}
