<?php

namespace App;

function run(string $name, int $total): string
{
    return format_line(
        "%s %d", $name, $total
    );
}

?>
-----
<?php

namespace App;

function run(string $name, int $total): string
{
    return format_line(
        
        "%s %d",
        $name,
        $total
    );
}

?>
