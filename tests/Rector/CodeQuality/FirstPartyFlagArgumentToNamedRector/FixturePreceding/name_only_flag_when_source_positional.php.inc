<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// The call is fully positional in source; only the trailing flag is named. The
// leading positional stays positional — `name_preceding_positionals` anchors on an
// argument named in the source, not one this rule just added.
function run(TokenStore $store): int
{
    return $store->seek(1, true);
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;

// The call is fully positional in source; only the trailing flag is named. The
// leading positional stays positional — `name_preceding_positionals` anchors on an
// argument named in the source, not one this rule just added.
function run(TokenStore $store): int
{
    return $store->seek(1, strict: true);
}
