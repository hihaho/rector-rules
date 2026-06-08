<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

// (d) Source\Invoice gets getTable() from a trait (flattened onto the model) →
// still an override → skip.
final class SkipTraitGetTableTest extends TestCase
{
    public function test_invoice(): void
    {
        $this->assertDatabaseHas('invoices', ['number' => 1]);
    }
}
