<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty;

final class TokenStore
{
    public function resolve(string $platform, bool $inherit): ?string
    {
        return $inherit ? $platform : null;
    }

    public static function make(string $platform, bool $shared): self
    {
        return new self();
    }

    public function cache(string $key, ?int $ttl): void {}

    public function toggle(bool $mobile): bool
    {
        return $mobile;
    }

    /** @return array<bool> */
    public function tags(bool ...$flags): array
    {
        return $flags;
    }
}
