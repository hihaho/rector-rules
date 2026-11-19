<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\Clock;

function run(Clock $clock, int $microsecond): \DateTime
{
    return $clock->setTime(12, 30, 0, $microsecond);
}

?>
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\Clock;

function run(Clock $clock, int $microsecond): \DateTime
{
    return $clock->setTime(12, 30, microsecond: $microsecond);
}

?>
