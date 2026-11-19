<?php

namespace App;

function join_parts(string $first, string $second, string $third): string
{
    return $first . $second . $third;
}

final class Range
{
    public function __construct(public int $start, public int $end, public int $step)
    {
    }

    public static function make(int $start, int $end, int $step): self
    {
        return new self($start, $end, $step);
    }
}

final class Calendar extends \DateTime
{
    public function setDate(int $year, int $month, int $day): static
    {
        return parent::setDate($year, $month, $day);
    }
}

function run(Calendar $calendar): array
{
    $calendar->setDate(2026, 1, 1);

    return [join_parts('a', 'b', 'c'), new Range(1, 10, 2), Range::make(1, 10, 2)];
}

?>
-----
<?php

namespace App;

function join_parts(string $first, string $second, string $third): string
{
    return $first . $second . $third;
}

final class Range
{
    public function __construct(public int $start, public int $end, public int $step)
    {
    }

    public static function make(int $start, int $end, int $step): self
    {
        return new self(
            
            $start,
            $end,
            $step
        );
    }
}

final class Calendar extends \DateTime
{
    public function setDate(int $year, int $month, int $day): static
    {
        return parent::setDate($year, $month, $day);
    }
}

function run(Calendar $calendar): array
{
    $calendar->setDate(
        
        2026,
        1,
        1
    );

    return [join_parts(
        
        'a',
        'b',
        'c'
    ), new Range(
        
        1,
        10,
        2
    ), Range::make(
        
        1,
        10,
        2
    )];
}

?>
