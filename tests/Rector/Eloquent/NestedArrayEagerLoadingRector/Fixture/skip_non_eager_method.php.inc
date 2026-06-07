<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class ModelD
{
    public const string RELATION_A = 'relationA';
    public const string RELATION_B = 'relationB';
    public const string CHILD = 'child';
}

// Not an eager-load method — rule must not apply
$something->process([
    ModelD::RELATION_A . '.' . ModelD::CHILD,
    ModelD::RELATION_A . '.' . ModelD::RELATION_B,
]);
