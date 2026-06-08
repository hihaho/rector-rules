<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

class TeamModel
{
    public const string MEMBERS = 'members';

    public const string MEMBERS_TABLE = 'members';

    public function ensureMembersLoaded(): void
    {
        $this->loadMissing('members');
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

class TeamModel
{
    public const string MEMBERS = 'members';

    public const string MEMBERS_TABLE = 'members';

    public function ensureMembersLoaded(): void
    {
        $this->loadMissing(self::MEMBERS);
    }
}
