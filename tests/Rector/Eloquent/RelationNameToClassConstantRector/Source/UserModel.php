<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source;

final class UserModel
{
    public const string ACTIVE_COMPANY = 'activeCompany';

    public const string PREFERRED_COMPANY = 'preferredCompany';

    public const string COMPANIES = 'companies';
}
