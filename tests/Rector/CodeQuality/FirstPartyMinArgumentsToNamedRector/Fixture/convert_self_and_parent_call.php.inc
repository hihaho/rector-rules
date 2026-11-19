<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

final class Statement extends Invoice
{
    public function addLine(string $label, int $amount, string $memo = ''): static
    {
        return parent::addLine($label, $amount, $memo);
    }

    public static function opening(): Invoice
    {
        return self::issue('OPEN', 2026, false);
    }

    public function discounted(): int
    {
        return $this->recalculate(100, 21, 5);
    }
}

?>
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

final class Statement extends Invoice
{
    public function addLine(string $label, int $amount, string $memo = ''): static
    {
        return parent::addLine(label: $label, amount: $amount, memo: $memo);
    }

    public static function opening(): Invoice
    {
        return self::issue(number: 'OPEN', year: 2026, draft: false);
    }

    public function discounted(): int
    {
        return $this->recalculate(net: 100, tax: 21, discount: 5);
    }
}

?>
