<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// $resource is non-null (inner ?-> removable), maybePoster is nullable (outer ?-> load-bearing)
function chainPartial(ArticleResource $resource): ?string
{
    return $resource?->maybePoster?->original;
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// $resource is non-null (inner ?-> removable), maybePoster is nullable (outer ?-> load-bearing)
function chainPartial(ArticleResource $resource): ?string
{
    return $resource->maybePoster?->original;
}
