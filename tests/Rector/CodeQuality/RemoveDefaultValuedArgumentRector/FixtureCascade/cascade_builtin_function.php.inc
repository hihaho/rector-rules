<?php

namespace App;

function run(string $text, int $length): bool
{
    return strspn($text, ' ', 0, $length) === $length;
}

?>
-----
<?php

namespace App;

function run(string $text, int $length): bool
{
    return strspn($text, ' ', length: $length) === $length;
}

?>
