<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source;

use Illuminate\Database\Eloquent\Model;

// An empty $table is a real (empty) table name to Eloquent — not a fallback to the
// convention — so it does not match the literal 'tokens' and must be skipped.
final class Token extends Model
{
    protected $table = '';
}
