<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\CompanyModel;

function queryCompanies(): void
{
    CompanyModel::with(['users', 'products']);
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\CompanyModel;

function queryCompanies(): void
{
    CompanyModel::with([CompanyModel::USERS, CompanyModel::PRODUCTS]);
}
