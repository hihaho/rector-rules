<?php

namespace App;

function run(string $secret): string
{
    return encrypt($secret, serialize: true);
}

?>
-----
<?php

namespace App;

function run(string $secret): string
{
    return encrypt($secret);
}

?>
