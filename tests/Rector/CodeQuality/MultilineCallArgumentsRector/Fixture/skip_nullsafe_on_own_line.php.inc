<?php

namespace App;

use App\Models\Order;

function run(?Order $order, string $name): void
{
    $order
        ?->ship($name, 1, true);
    $order->copy()
        ?->ship($name, 1, true);
}

?>
