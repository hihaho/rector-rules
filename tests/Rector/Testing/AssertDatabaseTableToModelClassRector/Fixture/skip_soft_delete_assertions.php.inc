<?php

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Fixture;

use Illuminate\Foundation\Testing\TestCase;

// Soft-delete assertions also resolve the deleted-at column from the model
// (getDeletedAtColumn) and require a soft-deletable model, so a table match does not
// prove behaviour is preserved — they are deliberately left untouched.
final class SkipSoftDeleteAssertionsTest extends TestCase
{
    public function test_soft_deletes(): void
    {
        $this->assertSoftDeleted('users', ['id' => 1]);
        $this->assertNotSoftDeleted('users', ['id' => 2]);
    }
}
