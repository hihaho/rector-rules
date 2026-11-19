<?php

namespace App;

function run(array $items, int $total): array
{
    return map_items(fn (int $item): int => $item * $total, $items, $items);
}

?>
-----
<?php

namespace App;

function run(array $items, int $total): array
{
    return map_items(
        
        fn (int $item): int => $item * $total,
        $items,
        $items
    );
}

?>
