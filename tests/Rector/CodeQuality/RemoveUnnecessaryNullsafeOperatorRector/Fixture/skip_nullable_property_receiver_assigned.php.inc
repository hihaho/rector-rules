<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// nullable native property receiver, result assigned and null-checked — the nullsafe IS needed, must stay
function originalOrEmpty(ArticleResource $resource): string
{
    $original = $resource->maybePoster?->original;

    if ($original === null) {
        return '';
    }

    return $original;
}
