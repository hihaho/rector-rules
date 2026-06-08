<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source;

use Illuminate\Database\Eloquent\Model;
use Override;

// Overrides getTable() → runtime table is not statically knowable → must be skipped
// even though the convention name would match `orders`.
final class Order extends Model
{
    #[Override]
    public function getTable(): string
    {
        return 'orders';
    }
}
