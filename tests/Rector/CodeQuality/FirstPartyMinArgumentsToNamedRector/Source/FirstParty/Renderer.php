<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty;

interface Renderer
{
    public function render(string $template, int $width, bool $inline): string;
}
