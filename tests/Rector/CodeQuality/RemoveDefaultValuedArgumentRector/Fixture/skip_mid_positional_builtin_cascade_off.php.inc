<?php

namespace App;

function run(string $text, int $length): int
{
    return strspn($text, ' ', 0, $length);
}

?>
