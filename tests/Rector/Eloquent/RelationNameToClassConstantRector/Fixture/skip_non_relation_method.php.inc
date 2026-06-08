<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\UserModel;

// 'activeCompany' has a matching constant, but makeHidden() is not a relation
// method — the method-name gate must keep this call untouched.
function hideActiveCompany(UserModel $user): void
{
    $user->makeHidden('activeCompany');
}
