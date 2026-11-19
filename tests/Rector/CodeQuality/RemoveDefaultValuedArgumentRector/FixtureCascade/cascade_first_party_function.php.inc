<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty;

function measure(string $text, int $offset = 0, ?int $length = null): int
{
    return $offset + ($length ?? strlen($text));
}

function run(string $text, int $length): int
{
    return measure($text, 0, $length);
}

?>
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty;

function measure(string $text, int $offset = 0, ?int $length = null): int
{
    return $offset + ($length ?? strlen($text));
}

function run(string $text, int $length): int
{
    return measure($text, length: $length);
}

?>
