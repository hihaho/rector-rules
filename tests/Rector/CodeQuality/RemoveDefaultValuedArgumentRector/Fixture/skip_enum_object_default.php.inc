<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;
use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Status;

// An enum-case object default is not reflected back as a comparable constant, so the
// matching Status::Active argument is left in place.
function run(Repository $repository): Repository
{
    return $repository->withStatus(Status::Active);
}
