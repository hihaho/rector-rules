<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// Every optional argument is at its default, so the whole tail collapses.
function run(Repository $repository): Repository
{
    return $repository->relate('posts', '>=', 1);
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// Every optional argument is at its default, so the whole tail collapses.
function run(Repository $repository): Repository
{
    return $repository->relate('posts');
}
