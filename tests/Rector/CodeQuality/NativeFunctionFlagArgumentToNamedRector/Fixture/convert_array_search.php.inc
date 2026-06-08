<?php

namespace App;

function locate($needle, array $haystack)
{
    return array_search($needle, $haystack, true);
}
-----
<?php

namespace App;

function locate($needle, array $haystack)
{
    return array_search($needle, $haystack, strict: true);
}
