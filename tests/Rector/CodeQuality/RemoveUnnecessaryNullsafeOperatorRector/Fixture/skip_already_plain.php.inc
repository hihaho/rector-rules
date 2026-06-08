<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// already plain `->` — nothing to do
function plain(ArticleResource $resource): string
{
    return $resource->poster->original;
}
