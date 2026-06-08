<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty;

final class TokenStore
{
    /** @var array<string, ?int> */
    private array $cached = [];

    public function resolve(string $platform, bool $inherit): ?string
    {
        return $inherit && array_key_exists($platform, $this->cached) ? $platform : null;
    }

    public static function make(string $platform, bool $shared): self
    {
        $store = new self();
        $store->cache($platform, $shared ? 60 : null);

        return $store;
    }

    public function cache(string $key, ?int $ttl): void
    {
        $this->cached[$key] = $ttl;
    }

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
