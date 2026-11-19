<?php

namespace App;

function run(string $name, int $total): string
{
    return sprintf("%s %d",
        $name, $total);
}

?>
