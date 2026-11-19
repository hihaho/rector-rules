<?php

namespace App;

use function Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\measure;

// Cascade is enabled, but this measure() is outside the configured first-party
// namespaces and is not a built-in, so the mid-positional 0 stays.
function run(string $text, int $length): int
{
    return measure($text, 0, $length);
}

?>
