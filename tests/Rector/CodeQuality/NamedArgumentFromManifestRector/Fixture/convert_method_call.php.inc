<?php

function run($store, $platform, $start, $end, $q): void
{
    $store->getToken($platform, false);
}
-----
<?php

function run($store, $platform, $start, $end, $q): void
{
    $store->getToken($platform, inherit: false);
}
