<?php

namespace App;

function run(\DateTime $date, int $microsecond): \DateTime
{
    return $date->setTime(12, 30, 0, $microsecond);
}

?>
-----
<?php

namespace App;

function run(\DateTime $date, int $microsecond): \DateTime
{
    return $date->setTime(12, 30, microsecond: $microsecond);
}

?>
