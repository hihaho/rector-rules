<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source;

use Illuminate\Database\Eloquent\Model;

// getTable() comes from a trait → still not statically knowable → must be skipped.
final class Invoice extends Model
{
    use ResolvesTableDynamically;
}
