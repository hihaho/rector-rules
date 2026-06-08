<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source;

use Illuminate\Database\Eloquent\Model;

// Passes the table (convention 'tenants') and connection checks, but its constructor
// mutates the table at runtime — so construction is not inert and it must be skipped.
final class Tenant extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable('configured_tenants');
    }
}
