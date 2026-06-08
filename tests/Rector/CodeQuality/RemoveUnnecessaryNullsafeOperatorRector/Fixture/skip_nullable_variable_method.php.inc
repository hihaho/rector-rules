<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Poster;

// nullable variable, method call — the nullsafe IS needed, must stay
function maybeCaption(?Poster $poster): ?string
{
    return $poster?->caption();
}
