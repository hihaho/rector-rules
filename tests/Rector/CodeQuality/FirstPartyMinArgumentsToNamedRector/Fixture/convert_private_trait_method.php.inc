<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Concerns;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

trait FormatsLines
{
    public function render(Invoice $invoice, string $value): string
    {
        $invoice->addLine('Shipping', 500, 'flat rate');

        return $this->formatLine($value, 'a', 'b') . self::joinParts($value, 'a', 'b');
    }

    private function formatLine(string $value, string $prefix, string $suffix): string
    {
        return $prefix . $value . $suffix;
    }

    private static function joinParts(string $value, string $prefix, string $suffix): string
    {
        return $prefix . $value . $suffix;
    }
}

?>
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Concerns;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Invoice;

trait FormatsLines
{
    public function render(Invoice $invoice, string $value): string
    {
        $invoice->addLine(label: 'Shipping', amount: 500, memo: 'flat rate');

        return $this->formatLine(value: $value, prefix: 'a', suffix: 'b') . self::joinParts(value: $value, prefix: 'a', suffix: 'b');
    }

    private function formatLine(string $value, string $prefix, string $suffix): string
    {
        return $prefix . $value . $suffix;
    }

    private static function joinParts(string $value, string $prefix, string $suffix): string
    {
        return $prefix . $value . $suffix;
    }
}

?>
