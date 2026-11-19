<?php

namespace App\Demo;

use App\Orders\ShipmentNotice;

function build($order): ShipmentNotice
{
    return new ShipmentNotice($order, true);
}
-----
<?php

namespace App\Demo;

use App\Orders\ShipmentNotice;

function build($order): ShipmentNotice
{
    return new ShipmentNotice($order, notifyCustomer: true);
}
