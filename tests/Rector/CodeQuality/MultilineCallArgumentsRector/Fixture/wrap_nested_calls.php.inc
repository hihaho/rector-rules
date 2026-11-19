<?php

namespace App;

function run(array $items, int $offset): array
{
    return merge_items($items, slice_items($items, $offset, 2), []);
}

?>
-----
<?php

namespace App;

function run(array $items, int $offset): array
{
    return merge_items(
        
        $items,
        slice_items(
            
            $items,
            $offset,
            2
        ),
        []
    );
}

?>
