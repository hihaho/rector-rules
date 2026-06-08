<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\CompanyModel;

function loadCompanyRelations(CompanyModel $company): void
{
    $company->load([
        'users' => fn ($query) => $query->limit(1),
        'products',
    ]);
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\CompanyModel;

function loadCompanyRelations(CompanyModel $company): void
{
    $company->load([
        CompanyModel::USERS => fn ($query) => $query->limit(1),
        CompanyModel::PRODUCTS,
    ]);
}
