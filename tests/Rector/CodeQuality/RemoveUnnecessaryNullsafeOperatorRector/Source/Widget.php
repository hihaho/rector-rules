<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source;

final class Widget implements Identifiable, Renderable
{
    public function render(): string
    {
        return '';
    }

    public function id(): int
    {
        return 0;
    }
}
