<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source;

use Illuminate\Database\Eloquent\Model;

// Convention table 'workspaces' matches, but a trait initializer mutates the table on
// construction — not statically inert → must be skipped.
final class Workspace extends Model
{
    use InitializesWorkspaceTable;
}
