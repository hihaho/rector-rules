<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty;

final class TokenStore
{
    /** @var array<string, ?int> */
    private array $cached = [];

    public function __construct(string $platform = '', bool $inherit = true, bool $shared = false)
    {
        $this->cached[$platform] = $inherit || $shared ? 1 : null;
    }

    public function resolve(string $platform, bool $inherit): ?string
    {
        return $inherit && array_key_exists($platform, $this->cached) ? $platform : null;
    }

    public function configure(string $platform, bool $setDefaultNullValue = false, bool $isBoolean = false): void
    {
        $this->cached[$platform] = $setDefaultNullValue || $isBoolean ? 1 : null;
    }

    public function loadCount(?bool $hasStarted, int $start, int $end): int
    {
        return ($hasStarted ?? false) ? $end - $start : $start;
    }

    public function link(string $url, bool $openInSameWindow, string $name): string
    {
        return $openInSameWindow ? "{$name}:{$url}" : $url;
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
