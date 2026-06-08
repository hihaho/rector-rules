<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Inner;
use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// every hop is non-null — the whole chain's nullsafe is unnecessary
function chainAll(ArticleResource $resource): Inner
{
    return $resource?->poster?->inner;
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Inner;
use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// every hop is non-null — the whole chain's nullsafe is unnecessary
function chainAll(ArticleResource $resource): Inner
{
    return $resource->poster->inner;
}
