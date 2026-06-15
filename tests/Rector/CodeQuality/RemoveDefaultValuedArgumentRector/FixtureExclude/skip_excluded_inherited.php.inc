<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\ExtendedRepository;

// Called on a subclass; signature() is declared on Repository, so excluding
// Repository::signature covers the inherited call too.
function run(ExtendedRepository $repository): string
{
    return $repository->signature(60, 1);
}
