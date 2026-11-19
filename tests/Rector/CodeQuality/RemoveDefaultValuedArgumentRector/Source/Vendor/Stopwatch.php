<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor;

use DateTime;

/**
 * Overrides DateTime::setTime() with a renamed parameter, outside the first-party
 * namespaces, so naming its arguments is not safe.
 */
final class Stopwatch extends DateTime
{
    public function setTime(int $hour, int $minute, int $second = 0, int $micro = 0): static
    {
        return parent::setTime($hour, $minute, $second, $micro);
    }
}
