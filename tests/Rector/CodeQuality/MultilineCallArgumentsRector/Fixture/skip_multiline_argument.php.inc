<?php

namespace App;

function run(array $items, int $total): array
{
    return array_map(function (int $item) use ($total): int {
        return $item * $total;
    }, $items, $items);
}

?>
