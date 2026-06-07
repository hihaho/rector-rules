<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class Interaction
{
    public const string ADAPTIVE_COMPARE_CONDITION = 'adaptiveCompareCondition';
}

class AdaptiveCompareCondition
{
    public const string TARGETS = 'targets';
}

$query->with([
    Interaction::ADAPTIVE_COMPARE_CONDITION . '.' . AdaptiveCompareCondition::TARGETS,
]);
