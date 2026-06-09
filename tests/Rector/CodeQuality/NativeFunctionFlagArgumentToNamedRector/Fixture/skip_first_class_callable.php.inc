<?php

namespace App;

// First-class callable syntax for every mapped function: no trailing flag argument
// to name, and CallLike::getArgs() asserts against being called on one. Must skip,
// not crash.
function callables(array $words): array
{
    return [
        in_array(...),
        array_search(...),
        json_decode(...),
        array_map(strlen(...), $words),
    ];
}
