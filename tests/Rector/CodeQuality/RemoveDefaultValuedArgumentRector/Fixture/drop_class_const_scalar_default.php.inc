<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// Default is a class constant (self::DEFAULT_PER_PAGE === 15) that resolves to a
// scalar, so a matching literal 15 is droppable.
function run(Repository $repository, int $page): Repository
{
    return $repository->paginate($page, 15);
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// Default is a class constant (self::DEFAULT_PER_PAGE === 15) that resolves to a
// scalar, so a matching literal 15 is droppable.
function run(Repository $repository, int $page): Repository
{
    return $repository->paginate($page);
}
