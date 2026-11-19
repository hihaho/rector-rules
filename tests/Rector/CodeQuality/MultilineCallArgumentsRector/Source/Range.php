<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\MultilineCallArgumentsRector\Source;

final readonly class Range
{
    public function __construct(public int $start, public int $end, public int $step) {}

    public static function make(int $start, int $end, int $step): self
    {
        return new self($start, $end, $step);
    }
}
