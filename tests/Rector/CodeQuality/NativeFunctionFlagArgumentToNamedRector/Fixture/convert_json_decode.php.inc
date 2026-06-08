<?php

namespace App;

function decode(string $json): array
{
    return json_decode($json, true);
}
-----
<?php

namespace App;

function decode(string $json): array
{
    return json_decode($json, associative: true);
}
