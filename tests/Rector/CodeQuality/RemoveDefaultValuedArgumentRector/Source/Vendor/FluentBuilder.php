<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor;

// columns(int $columns = 2) mirrors third-party fluent-builder patterns (e.g. form components)
final class FluentBuilder
{
    private int $columns = 2;

    public static function make(): static
    {
        return new self();
    }

    public function init(string $label = 'default'): static
    {
        $this->columns = strlen($label);

        return $this;
    }

    public function columns(int $columns = 2): static
    {
        $this->columns = $columns;

        return $this;
    }

    public function build(): string
    {
        return 'columns:' . $this->columns;
    }
}
