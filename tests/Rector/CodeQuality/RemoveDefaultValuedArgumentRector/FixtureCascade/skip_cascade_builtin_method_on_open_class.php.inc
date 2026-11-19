<?php

namespace App;

// A \DateTime can be a subclass at runtime, such as Carbon, which renames
// $microsecond, so the arguments are not named.
function run(\DateTime $date, int $microsecond): \DateTime
{
    return $date->setTime(12, 30, 0, $microsecond);
}

?>
