<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source;

/**
 * Test double standing in for a consumer model whose field-name constants the
 * manifest points at. The constant is consumed by {@see key()} so the auto-fix
 * deadcode pass keeps it (see the package CLAUDE.md note on Source/ classes).
 */
class Order
{
    public const string ID = 'id';

    public function key(): string
    {
        return self::ID;
    }
}
