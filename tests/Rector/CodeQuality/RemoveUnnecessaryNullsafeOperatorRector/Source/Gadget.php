<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source;

final class Gadget implements Renderable
{
    public function render(): string
    {
        return '';
    }
}
