<?php

namespace App;

function check($needle, array $haystack): bool
{
    return in_array($needle, $haystack, false);
}
-----
<?php

namespace App;

function check($needle, array $haystack): bool
{
    return in_array($needle, $haystack, strict: false);
}
