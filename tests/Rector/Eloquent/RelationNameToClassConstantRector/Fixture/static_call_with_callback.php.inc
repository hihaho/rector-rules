<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\CompanyModel;

function queryCompaniesWithConstraint(): void
{
    // Only the first argument is the relation name; the callback is left untouched.
    CompanyModel::with('users', fn ($query) => $query->limit(1));
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\CompanyModel;

function queryCompaniesWithConstraint(): void
{
    // Only the first argument is the relation name; the callback is left untouched.
    CompanyModel::with(CompanyModel::USERS, fn ($query) => $query->limit(1));
}
