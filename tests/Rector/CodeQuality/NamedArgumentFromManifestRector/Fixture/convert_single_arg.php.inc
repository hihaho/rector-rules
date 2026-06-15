<?php

function run($store): void
{
    $store->activate(false);
}
-----
<?php

function run($store): void
{
    $store->activate(active: false);
}
