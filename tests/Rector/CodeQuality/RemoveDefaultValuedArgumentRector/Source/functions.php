<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty {
    function measure(string $text, int $offset = 0, ?int $length = null): int
    {
        return $offset + ($length ?? strlen($text));
    }
}

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor {
    function measure(string $text, int $offset = 0, ?int $length = null): int
    {
        return $offset + ($length ?? strlen($text));
    }
}
