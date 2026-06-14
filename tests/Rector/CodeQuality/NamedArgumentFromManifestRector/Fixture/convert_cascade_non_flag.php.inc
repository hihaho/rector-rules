<?php

function run($store, $platform, $start, $end, $q): void
{
    $store->loadCount(true, $start, $end);
}
-----
<?php

function run($store, $platform, $start, $end, $q): void
{
    $store->loadCount(hasStarted: true, start: $start, end: $end);
}
