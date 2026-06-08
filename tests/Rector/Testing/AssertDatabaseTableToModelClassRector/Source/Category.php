<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source;

use Illuminate\Database\Eloquent\Model;

// Convention table: `categories`. A literal `'category'` (the singular) must NOT
// convert — the model's real table differs from the string.
final class Category extends Model {}
