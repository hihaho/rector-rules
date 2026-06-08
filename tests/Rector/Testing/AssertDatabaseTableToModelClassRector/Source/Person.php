<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source;

use Illuminate\Database\Eloquent\Model;

// Custom table the convention can't derive from 'legacy_people'; reachable only via
// the table_to_model map, and still verified against the literal before converting.
final class Person extends Model
{
    protected $table = 'legacy_people';
}
