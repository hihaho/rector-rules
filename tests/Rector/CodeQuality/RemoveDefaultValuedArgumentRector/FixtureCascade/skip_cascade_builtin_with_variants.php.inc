<?php

namespace App;

// PHPStan knows more than one signature for setcookie(), and a variant's parameter
// names may not match the runtime ones, so the arguments are not named.
function run(string $path): bool
{
    return setcookie('session', '', 0, $path);
}

?>
