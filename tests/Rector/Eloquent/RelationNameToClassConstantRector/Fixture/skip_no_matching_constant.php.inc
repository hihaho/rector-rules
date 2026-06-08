<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\UserModel;

function loadAvatar(UserModel $user): void
{
    $user->loadMissing('avatar');
}
