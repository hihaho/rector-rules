<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\MultilineCallArgumentsRector\Source\Calendar;
use Hihaho\RectorRules\Tests\Rector\CodeQuality\MultilineCallArgumentsRector\Source\Range;

function run(Calendar $calendar): array
{
    $calendar->setDate(2026, 1, 1);

    return [new Range(1, 10, 2), Range::make(1, 10, 2)];
}

?>
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\MultilineCallArgumentsRector\Source\Calendar;
use Hihaho\RectorRules\Tests\Rector\CodeQuality\MultilineCallArgumentsRector\Source\Range;

function run(Calendar $calendar): array
{
    $calendar->setDate(
        
        2026,
        1,
        1
    );

    return [new Range(
        
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
