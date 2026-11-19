<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\MultilineCallArgumentsRector\Source\Schedule;

function run(string $text, int $offset, \DateTime $date, ?\DateTime $maybe, Schedule $schedule): bool
{
    $date->setDate(2026, 1, 1);
    $maybe?->setDate(2026, 1, 1);
    $schedule->setDate(2026, 1, 1);
    $parsed = \DateTimeImmutable::createFromFormat('Y-m-d', '2026-01-01', null);
    $range = new \DatePeriod($date, new \DateInterval('P1D'), 3);

    return strspn($text, " \t", length: $offset) === $offset;
}

?>
