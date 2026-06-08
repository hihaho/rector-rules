<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source;

// An Eloquent trait initializer — Model::__construct runs initialize{Trait}() hooks,
// so this can mutate the table/connection at construction time.
trait InitializesWorkspaceTable
{
    public function initializeInitializesWorkspaceTable(): void
    {
        $this->setTable('configured_workspaces');
    }
}
