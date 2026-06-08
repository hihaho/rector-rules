<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Widget;

// union mixes an object with a scalar — not provably an object, must stay
function maybeScalar(Widget|int $item): mixed
{
    return $item?->render();
}
