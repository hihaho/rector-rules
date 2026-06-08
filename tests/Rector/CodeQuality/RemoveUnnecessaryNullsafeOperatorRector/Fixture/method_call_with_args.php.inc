<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Poster;

// method-call arguments must be preserved on the rewritten call
function scaled(Poster $poster): string
{
    return $poster?->scaled(2, 'px');
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Poster;

// method-call arguments must be preserved on the rewritten call
function scaled(Poster $poster): string
{
    return $poster->scaled(2, 'px');
}
