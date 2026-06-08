<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// the `?? ''` coalesce tail must be preserved when the nullsafe is removed
function thumbnailOrEmpty(ArticleResource $resource): string
{
    return $resource->poster?->original ?? '';
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// the `?? ''` coalesce tail must be preserved when the nullsafe is removed
function thumbnailOrEmpty(ArticleResource $resource): string
{
    return $resource->poster->original ?? '';
}
