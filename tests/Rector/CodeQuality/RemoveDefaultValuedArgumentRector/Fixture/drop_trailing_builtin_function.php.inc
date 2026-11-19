<?php

namespace App;

function run(string $text): string
{
    return str_pad($text, 10, ' ');
}

?>
-----
<?php

namespace App;

function run(string $text): string
{
    return str_pad($text, 10);
}

?>
