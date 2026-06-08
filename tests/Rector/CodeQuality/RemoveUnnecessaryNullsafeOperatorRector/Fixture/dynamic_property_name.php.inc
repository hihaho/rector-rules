<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// dynamic property name on a non-null receiver — Expr name must be preserved
function dynamic(ArticleResource $resource, string $name): mixed
{
    return $resource->poster?->{$name};
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\ArticleResource;

// dynamic property name on a non-null receiver — Expr name must be preserved
function dynamic(ArticleResource $resource, string $name): mixed
{
    return $resource->poster->{$name};
}
