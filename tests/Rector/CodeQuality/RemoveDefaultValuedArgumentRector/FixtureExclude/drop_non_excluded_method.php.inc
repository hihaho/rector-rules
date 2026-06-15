<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// paginate() is not excluded, so a redundant default is still dropped — the exclusion
// is targeted to signature(), not the whole class.
function run(Repository $repository, int $page): Repository
{
    return $repository->paginate($page, 15);
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// paginate() is not excluded, so a redundant default is still dropped — the exclusion
// is targeted to signature(), not the whole class.
function run(Repository $repository, int $page): Repository
{
    return $repository->paginate($page);
}
