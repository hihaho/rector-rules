<?php

namespace App;

// Rector can turn `new \DateTime()` into Carbon, which renames $microsecond.
function run(int $microsecond): \DateTime
{
    return (new \DateTime())->setTime(12, 30, 0, $microsecond);
}

?>
