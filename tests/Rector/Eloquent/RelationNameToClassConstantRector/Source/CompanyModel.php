<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source;

final class CompanyModel
{
    public const string USERS = 'users';

    public const string PRODUCTS = 'products';
}
