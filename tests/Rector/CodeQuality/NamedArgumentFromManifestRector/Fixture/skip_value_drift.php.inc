<?php

function run($store, $platform, $start, $end, $q): void
{
    $store->toggle($platform, true);
}
