<?php

namespace App;

final class Clock extends \DateTime
{
}

function run(Clock $clock, int $microsecond): \DateTime
{
    return $clock->setTime(12, 30, 0, $microsecond);
}

?>
-----
<?php

namespace App;

final class Clock extends \DateTime
{
}

function run(Clock $clock, int $microsecond): \DateTime
{
    return $clock->setTime(12, 30, microsecond: $microsecond);
}

?>
