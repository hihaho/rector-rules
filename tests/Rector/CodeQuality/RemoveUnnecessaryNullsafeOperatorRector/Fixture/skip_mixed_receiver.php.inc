<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

// untyped (mixed) receiver — cannot prove non-null object, must stay
function untyped($value): mixed
{
    return $value?->something();
}
