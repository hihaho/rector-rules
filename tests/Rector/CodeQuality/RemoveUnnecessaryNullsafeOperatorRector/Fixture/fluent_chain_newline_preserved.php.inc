<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\FluentBuilder;

// fluent chain must stay multi-line after the nullsafe removal
function fluent(FluentBuilder $builder): string
{
    return $builder
        ?->select('id')
        ?->where('status', 'active')
        ?->get();
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\FluentBuilder;

// fluent chain must stay multi-line after the nullsafe removal
function fluent(FluentBuilder $builder): string
{
    return $builder->select('id')
        ->where('status', 'active')
        ->get();
}
