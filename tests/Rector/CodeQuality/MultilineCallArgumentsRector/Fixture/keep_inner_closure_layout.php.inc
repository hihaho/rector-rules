<?php

namespace App;

function run(array $items, int $total): array
{
    return array_map(fn (int $item): int => $item * $total, $items, $items);
}

?>
-----
<?php

namespace App;

function run(array $items, int $total): array
{
    return array_map(
        
        fn (int $item): int => $item * $total,
        $items,
        $items
    );
}

?>
