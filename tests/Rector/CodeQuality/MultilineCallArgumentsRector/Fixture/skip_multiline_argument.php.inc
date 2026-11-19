<?php

namespace App;

function run(array $items, int $total): array
{
    return map_items(function (int $item) use ($total): int {
        return $item * $total;
    }, $items, $items);
}

?>
