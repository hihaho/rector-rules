<?php

namespace App;

function measure(string $text, int $offset = 0, ?int $length = null): int
{
    return $offset + ($length ?? strlen($text));
}

// Cascade is enabled, but App\measure() is outside the configured first-party
// namespaces and is not a built-in, so the mid-positional 0 stays.
function run(string $text, int $length): int
{
    return measure($text, 0, $length);
}

?>
