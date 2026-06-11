<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\UserModel;

// 'companies' matches a constant on UserModel, but the model is a plain double
// with no resolvable relation method, so the next hop ('users') cannot be
// resolved. Conversion is all-or-nothing per path, so the whole string is left
// untouched rather than half-converted.
function loadNestedRelation(UserModel $user): void
{
    $user->loadMissing('companies.users');
}
