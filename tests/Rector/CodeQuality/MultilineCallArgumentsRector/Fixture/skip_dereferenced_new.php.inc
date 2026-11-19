<?php

namespace App;

use App\Models\Order;

function run(string $name, int $total): void
{
    new Order($name, $total, false)->ship($name, $total, true);
    new Order($name, $total, false)?->ship($name, $total, true);
    $status = new Order($name, $total, false)->status;
    $class = new Order($name, $total, false)::class;
    $first = new Order($name, $total, false)['lines'];
    new Order($name, $total, false)::create($name, $total, true);
    $nullsafeStatus = new Order($name, $total, false)?->status;
    $registry = new Order($name, $total, false)::$registry;
}

?>
