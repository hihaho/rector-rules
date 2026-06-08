<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source;

// A trait that overrides getTable(). PHP flattens it onto the using model, so the
// override is still attributed to the model — the dynamic-table guard must skip it.
trait ResolvesTableDynamically
{
    public function getTable(): string
    {
        return 'invoices';
    }
}
