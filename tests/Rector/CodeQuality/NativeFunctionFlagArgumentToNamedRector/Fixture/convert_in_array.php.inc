<?php

namespace App;

function check($needle, array $haystack): bool
{
    return in_array($needle, $haystack, true);
}
-----
<?php

namespace App;

function check($needle, array $haystack): bool
{
    return in_array($needle, $haystack, strict: true);
}
