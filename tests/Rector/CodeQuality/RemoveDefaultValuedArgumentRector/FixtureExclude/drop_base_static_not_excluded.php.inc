<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// Only ExtendedRepository::make is excluded; a base Repository::make call is not the
// configured subclass (nor a subclass of it), so its all-default tail still collapses.
function run(): string
{
    return Repository::make(60, 1);
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// Only ExtendedRepository::make is excluded; a base Repository::make call is not the
// configured subclass (nor a subclass of it), so its all-default tail still collapses.
function run(): string
{
    return Repository::make();
}
