<?php

function run($store, $platform, $start, $end, $q): void
{
    $store->partial($platform, $start, $end);
}
