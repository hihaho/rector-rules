<?php

namespace App;

function run(string $name, int $total): string
{
    return sprintf($name, $total);
}

?>
-----
<?php

namespace App;

function run(string $name, int $total): string
{
    return sprintf(
        
        $name,
        $total
    );
}

?>
