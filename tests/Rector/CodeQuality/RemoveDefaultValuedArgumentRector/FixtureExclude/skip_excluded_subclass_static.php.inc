<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\ExtendedRepository;

// make() is declared on Repository but called via ExtendedRepository; the config
// excludes ExtendedRepository::make, matched by the *called* class. Both args default,
// so without the exclusion it would collapse to make().
function run(): string
{
    return ExtendedRepository::make(60, 1);
}
