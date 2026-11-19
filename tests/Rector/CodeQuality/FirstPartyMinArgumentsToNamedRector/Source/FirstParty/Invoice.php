<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty;

class Invoice
{
    /** @var list<string> */
    protected array $lines = [];

    public function __construct(string $number, int $year, bool $draft)
    {
        $this->lines[] = $draft ? "{$number}-{$year}-draft" : "{$number}-{$year}";
    }

    public function addLine(string $label, int $amount, string $memo = ''): static
    {
        $this->lines[] = "{$label}:{$amount}:{$memo}";

        return $this;
    }

    public static function issue(string $number, int $year, bool $draft): self
    {
        return new self($number, $year, $draft);
    }

    public function total(int $net, int $tax): int
    {
        return $net + $tax;
    }

    public function tag(string $label, string ...$tags): string
    {
        return $label . implode(',', $tags);
    }

    /**
     * @no-named-arguments
     */
    public function legacy(string $label, int $amount, string $memo): string
    {
        return "{$label}:{$amount}:{$memo}";
    }

    protected function recalculate(int $net, int $tax, int $discount): int
    {
        return $net + $tax - $discount;
    }
}
