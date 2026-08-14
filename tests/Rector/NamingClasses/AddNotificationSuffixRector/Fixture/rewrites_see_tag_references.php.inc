<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class OrderShipped extends Notification
{
}

/**
 * Inline tag: {@see OrderShipped} and {@see \App\Notifications\OrderShipped}.
 *
 * @see OrderShipped
 * @see \App\Notifications\OrderShipped
 * @see OrderShipped::toMail()
 * @link OrderShipped
 * @uses OrderShipped
 */
class OrderShippedDispatcher
{
    /**
     * @param  OrderShipped  $notification
     * @return OrderShipped
     */
    public function passThrough(OrderShipped $notification): OrderShipped
    {
        return $notification;
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

/**
 * Inline tag: {@see OrderShippedNotification} and {@see \App\Notifications\OrderShippedNotification}.
 *
 * @see OrderShippedNotification
 * @see \App\Notifications\OrderShippedNotification
 * @see OrderShippedNotification::toMail()
 * @link OrderShippedNotification
 * @uses OrderShippedNotification
 */
class OrderShippedDispatcher
{
    /**
     * @param \App\Notifications\OrderShippedNotification $notification
     * @return \App\Notifications\OrderShippedNotification
     */
    public function passThrough(\App\Notifications\OrderShippedNotification $notification): \App\Notifications\OrderShippedNotification
    {
        return $notification;
    }
}

?>
