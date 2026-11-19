<?php

namespace App;

// Each callee branches on how many arguments it gets (func_num_args(), or a built-in
// with more than one signature), so dropping a default changes what the call does.
function run(array $rows): array
{
    return [
        str(null),
        response(null, 200),
        collect($rows)->where('status', null),
        setcookie('session', '', 0),
    ];
}

?>
