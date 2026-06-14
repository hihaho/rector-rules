<?php

function run($store, $platform, $start, $end, $q): void
{
    $store->setOption($platform, null);
}
-----
<?php

function run($store, $platform, $start, $end, $q): void
{
    $store->setOption($platform, option: null);
}
