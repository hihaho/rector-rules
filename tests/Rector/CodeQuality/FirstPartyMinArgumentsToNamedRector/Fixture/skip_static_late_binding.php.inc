<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

// static:: is late bound: a subclass may rename the parameters, and PHPStan's
// rename check does not cover static calls.
class Ledger extends Invoice
{
    public static function reopen(): Invoice
    {
        return static::issue('OPEN', 2026, true);
    }

    public static function make(): static
    {
        return new static('OPEN', 2026, true);
    }
}
