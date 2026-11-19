<?php

namespace App;

function run(string $name, int $total): string
{
    $first = sprintf(/* format */ "%s %d", $name, $total);

    return sprintf("%s %d", $name, /* total */ $total);
}

?>
