<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class OrderShipped extends Notification
{
}

class OrderShippedDispatcher
{
    /** @var OrderShipped|null */
    private $last;

    public function dispatch($customer): void
    {
        $customer->notify(new OrderShipped);

        $name = OrderShipped::class;
    }
}

?>
-----
<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class OrderShippedNotification extends Notification
{
}

class OrderShippedDispatcher
{
    /** @var \App\Notifications\OrderShippedNotification|null */
    private $last;

    public function dispatch($customer): void
    {
        $customer->notify(new \App\Notifications\OrderShippedNotification);

        $name = \App\Notifications\OrderShippedNotification::class;
    }
}

?>
