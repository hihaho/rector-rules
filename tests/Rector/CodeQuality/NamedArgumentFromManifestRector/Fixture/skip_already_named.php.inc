<?php

function run($store, $platform, $start, $end, $q): void
{
    $store->go($platform, named: true);
}
