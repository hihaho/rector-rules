<?php

namespace App;

// PHP function names are case-insensitive; the rule lowercases before the map
// lookup, so a mixed-case spelling still converts.
function check($needle, array $haystack): bool
{
    return In_Array($needle, $haystack, true);
}
-----
<?php

namespace App;

// PHP function names are case-insensitive; the rule lowercases before the map
// lookup, so a mixed-case spelling still converts.
function check($needle, array $haystack): bool
{
    return In_Array($needle, $haystack, strict: true);
}
