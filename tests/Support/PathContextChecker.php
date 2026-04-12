<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Support;

interface PathContextChecker
{
    public function check(): bool;
}
