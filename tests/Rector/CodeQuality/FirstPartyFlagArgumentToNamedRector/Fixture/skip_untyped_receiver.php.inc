<?php

namespace App;

// An untyped receiver resolves to no single class, so the parameter name cannot
// be looked up — the flag is left positional rather than guessed.
function run($store, string $platform): mixed
{
    return $store->resolve($platform, false);
}
