<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// PR #9290 shape: multi-hop native property chain, poster is non-null
function thumbnail(ArticleResource $resource): string
{
    return $resource->poster?->original;
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// PR #9290 shape: multi-hop native property chain, poster is non-null
function thumbnail(ArticleResource $resource): string
{
    return $resource->poster->original;
}
