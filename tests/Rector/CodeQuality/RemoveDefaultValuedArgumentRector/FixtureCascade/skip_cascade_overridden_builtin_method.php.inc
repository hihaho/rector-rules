<?php

namespace App;

// setTime() is overridden outside the first-party namespaces with renamed
// parameters, so naming the arguments could break; the call stays.
final class Stopwatch extends \DateTime
{
    public function setTime(int $hour, int $minute, int $second = 0, int $micro = 0): static
    {
        return parent::setTime($hour, $minute, $second, $micro);
    }
}

function run(Stopwatch $stopwatch, int $microsecond): \DateTime
{
    return $stopwatch->setTime(12, 30, 0, $microsecond);
}

?>
