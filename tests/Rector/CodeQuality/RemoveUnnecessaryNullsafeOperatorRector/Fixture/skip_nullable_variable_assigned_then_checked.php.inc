<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Poster;

// nullable variable, result assigned and null-checked afterwards — the nullsafe IS needed, must stay
function captionOrNull(?Poster $poster): ?string
{
    $caption = $poster?->caption();

    if ($caption === null) {
        return null;
    }

    return $caption;
}
