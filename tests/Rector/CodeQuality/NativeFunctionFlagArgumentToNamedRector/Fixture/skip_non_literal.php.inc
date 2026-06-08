<?php

namespace App;

function check($needle, array $haystack, bool $strict): bool
{
    return in_array($needle, $haystack, $strict);
}
