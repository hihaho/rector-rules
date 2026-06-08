<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source;

use Illuminate\Database\Eloquent\Model;

// Convention table: `users` (no $table, no getTable() override).
final class User extends Model {}
