<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\MultilineCallArgumentsRector\Source;

use DateTime;

/**
 * Overrides DateTime::setDate(), so a call to it is no longer a built-in call.
 */
final class Calendar extends DateTime
{
    public function setDate(int $year, int $month, int $day): static
    {
        return parent::setDate($year, $month, $day);
    }
}
