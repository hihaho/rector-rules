<?php

namespace App;

// A leading-backslash, fully-qualified call resolves to the same global function
// and converts.
function check($needle, array $haystack): bool
{
    return \in_array($needle, $haystack, true);
}
-----
<?php

namespace App;

// A leading-backslash, fully-qualified call resolves to the same global function
// and converts.
function check($needle, array $haystack): bool
{
    return \in_array($needle, $haystack, strict: true);
}
