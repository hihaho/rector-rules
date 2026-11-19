<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty;

final class CreditNote extends Invoice
{
    public function addLine(string $label, int $amount, string $memo = ''): static
    {
        return parent::addLine($label, -$amount, $memo);
    }

    public static function reissue(string $number, int $year): self
    {
        return self::fromParts($number, $year, false);
    }

    public static function fromParts(string $number, int $year, bool $draft): self
    {
        return new self($number, $year, $draft);
    }

    public function adjusted(int $net, int $tax): int
    {
        return $this->recalculate($net, $tax, 0);
    }
}
