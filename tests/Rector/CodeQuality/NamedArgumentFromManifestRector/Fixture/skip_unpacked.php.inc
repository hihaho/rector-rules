<?php

function run($store, $platform, $start, $end, $q): void
{
    $store->many($platform, ...[1, 2]);
}
