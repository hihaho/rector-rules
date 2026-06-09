<?php

namespace App;

// A first-class callable in the same file must be left alone while a real flag
// call still gets named — proves the guard is narrow.
function check($needle, array $haystack): array
{
    $ref = in_array(...);

    return [$ref, in_array($needle, $haystack, true)];
}
-----
<?php

namespace App;

// A first-class callable in the same file must be left alone while a real flag
// call still gets named — proves the guard is narrow.
function check($needle, array $haystack): array
{
    $ref = in_array(...);

    return [$ref, in_array($needle, $haystack, strict: true)];
}
