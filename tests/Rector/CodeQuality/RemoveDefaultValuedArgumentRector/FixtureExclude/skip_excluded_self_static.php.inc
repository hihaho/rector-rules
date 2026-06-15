<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;

// make() is declared on Repository; only the enclosing class — resolved from `self` —
// matches the configured App\SelfFactory exclusion. Verifies self:: is resolved, not
// passed to the ReflectionProvider as the literal name "self".
class SelfFactory extends Repository
{
    public function build(): string
    {
        return self::make(60, 1);
    }
}
