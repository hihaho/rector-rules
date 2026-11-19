<?php

namespace App;

use function Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\measure;

function run(string $text, int $length): int
{
    return measure($text, 0, $length);
}

?>
-----
<?php

namespace App;

use function Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\measure;

function run(string $text, int $length): int
{
    return measure($text, length: $length);
}

?>
