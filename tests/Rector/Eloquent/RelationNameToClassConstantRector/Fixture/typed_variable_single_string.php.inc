<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\UserModel;

function loadActiveCompany(UserModel $user): void
{
    $user->loadMissing('activeCompany');
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\UserModel;

function loadActiveCompany(UserModel $user): void
{
    $user->loadMissing(UserModel::ACTIVE_COMPANY);
}
