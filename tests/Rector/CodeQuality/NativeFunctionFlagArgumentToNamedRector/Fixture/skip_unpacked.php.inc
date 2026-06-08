<?php

namespace App;

function check($needle, array $haystack, array $rest): bool
{
    return in_array($needle, $haystack, ...$rest);
}
