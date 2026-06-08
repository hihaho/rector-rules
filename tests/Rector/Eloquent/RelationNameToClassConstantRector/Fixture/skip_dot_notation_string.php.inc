<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\UserModel;

// Dot-notation spans multiple models — no single constant matches the full string
function loadNestedRelation(UserModel $user): void
{
    $user->loadMissing('companies.users');
}
