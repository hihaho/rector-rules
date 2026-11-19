<?php

namespace App;

function run(array $items, int $offset): array
{
    return array_merge($items, array_slice($items, $offset, 2), []);
}

?>
-----
<?php

namespace App;

function run(array $items, int $offset): array
{
    return array_merge(
        
        $items,
        array_slice(
            
            $items,
            $offset,
            2
        ),
        []
    );
}

?>
