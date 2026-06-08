<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// nullable root — every nullsafe in the chain is load-bearing, none may be removed
function chainNullableRoot(?ArticleResource $resource): ?string
{
    return $resource?->poster?->original;
}
