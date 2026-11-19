<?php

namespace App;

// static:: can reach a subclass override at runtime, so the arguments are not named.
class Zone extends \DateTimeZone
{
    public static function forCountry(?string $country): array
    {
        return static::listIdentifiers(\DateTimeZone::ALL, $country);
    }
}

?>
