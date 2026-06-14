<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// true equals its default, but a kept positional ($ttl) follows it; with cascade off
// the trailing scan stops at $ttl and nothing is dropped.
function run(Repository $repository, ?int $ttl): Repository
{
    return $repository->configure('cache', true, $ttl);
}
