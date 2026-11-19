<?php

namespace App;

// An explicit false flag on these strict-rules functions marks a deliberate loose comparison.
function run(int $needle, array $haystack, string $encoded): bool
{
    $found = in_array($needle, $haystack, strict: false);
    $position = array_search($needle, $haystack, false);
    $decoded = base64_decode($encoded, false);

    return $found && $position !== false && $decoded !== false;
}

?>
