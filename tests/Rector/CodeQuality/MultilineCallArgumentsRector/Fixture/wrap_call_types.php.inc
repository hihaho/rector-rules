<?php

namespace App;

use App\Models\Order;

function run(?Order $order, string $name, int $total): void
{
    $line = sprintf("%s: %d", $name, $total);
    $copy = new Order($name, $total, false);
    $order?->ship($name, $total, true);
    Order::create($name, $total, false);
}

?>
-----
<?php

namespace App;

use App\Models\Order;

function run(?Order $order, string $name, int $total): void
{
    $line = sprintf(
        
        "%s: %d",
        $name,
        $total
    );
    $copy = new Order(
        
        $name,
        $total,
        false
    );
    $order?->ship(
        
        $name,
        $total,
        true
    );
    Order::create(
        
        $name,
        $total,
        false
    );
}

?>
