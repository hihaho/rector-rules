<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// nullable native property — the nullsafe IS needed, must stay
function maybeThumbnail(ArticleResource $resource): ?string
{
    return $resource->maybePoster?->original;
}
