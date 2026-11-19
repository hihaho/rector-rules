<?php

namespace App;

/** @param resource $context */
function run(string $path, $context, ?string $country): array
{
    return [
        new \SplFileObject($path, 'r', false, $context),
        \DateTimeZone::listIdentifiers(\DateTimeZone::ALL, $country),
    ];
}

?>
-----
<?php

namespace App;

/** @param resource $context */
function run(string $path, $context, ?string $country): array
{
    return [
        new \SplFileObject($path, context: $context),
        \DateTimeZone::listIdentifiers(countryCode: $country),
    ];
}

?>
