<?php

namespace App;

// Receiver has no resolvable type, so the callee parameters cannot be reflected.
function run($repository): mixed
{
    return $repository->cache('cache', null);
}
