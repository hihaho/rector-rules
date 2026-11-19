<?php

function run($store, $platform, $start, $end, $q): void
{
    new ShipmentNotice($q, true, false);
}
-----
<?php

function run($store, $platform, $start, $end, $q): void
{
    new ShipmentNotice($q, notifyCustomer: true, includeInvoice: false);
}
