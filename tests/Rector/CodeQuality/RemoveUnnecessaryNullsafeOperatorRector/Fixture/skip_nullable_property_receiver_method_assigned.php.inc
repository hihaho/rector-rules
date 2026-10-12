<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// nullable native property receiver, nullsafe method call assigned — the nullsafe IS needed, must stay
function captionOrEmpty(ArticleResource $resource): string
{
    $caption = $resource->maybePoster?->caption();

    return $caption ?? '';
}
