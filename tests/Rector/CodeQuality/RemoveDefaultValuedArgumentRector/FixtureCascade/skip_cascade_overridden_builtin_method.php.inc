<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\Stopwatch;

// Stopwatch overrides setTime() with a renamed parameter outside the first-party
// namespaces, so the arguments are not named.
function run(Stopwatch $stopwatch, int $microsecond): \DateTime
{
    return $stopwatch->setTime(12, 30, 0, $microsecond);
}

?>
