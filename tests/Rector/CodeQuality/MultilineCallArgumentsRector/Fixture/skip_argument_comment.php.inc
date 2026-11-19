<?php

namespace App;

function run(string $name, int $total): string
{
    $first = format_line(/* format */ "%s %d", $name, $total);

    return format_line("%s %d", $name, /* total */ $total);
}

?>
