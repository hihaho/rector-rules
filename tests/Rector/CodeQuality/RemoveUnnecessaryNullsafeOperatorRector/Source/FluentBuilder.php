<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source;

final class FluentBuilder
{
    /** @var list<string> */
    private array $applied = [];

    public function select(string $column): self
    {
        $this->applied[] = $column;

        return $this;
    }

    public function where(string $column, string $value): self
    {
        $this->applied[] = $column . '=' . $value;

        return $this;
    }

    public function get(): string
    {
        return implode(',', $this->applied);
    }
}
