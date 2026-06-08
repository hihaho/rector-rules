<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source;

use Illuminate\Database\Eloquent\Model;

// Convention table 'accounts' matches, but a non-default connection means the model
// form would assert against another connection → must be skipped.
final class Account extends Model
{
    protected $connection = 'tenant';
}
