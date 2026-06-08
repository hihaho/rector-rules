<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

class ProjectModel
{
    public const string OWNER_COLUMN = 'assignee';

    public const string RESPONSIBLE = 'assignee';

    public function ensureAssigneeLoaded(): void
    {
        $this->loadMissing('assignee');
    }
}
