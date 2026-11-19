<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty;

/**
 * @method string resolve(string $platform, bool $inherit)
 */
final class MagicTokenStore
{
    /**
     * @param array<int, mixed> $arguments
     */
    public function __call(string $name, array $arguments): string
    {
        return $name . ':' . count($arguments);
    }
}
