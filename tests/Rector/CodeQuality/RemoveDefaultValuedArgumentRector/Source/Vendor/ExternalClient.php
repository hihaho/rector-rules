<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor;

/**
 * Stands in for a third-party signature: it lives outside the configured
 * first_party_namespaces, so a pure drop is allowed against it but a cascade
 * (parameter-name-coupled) rename is not.
 */
final class ExternalClient
{
    /** @var list<string> */
    private array $sent = [];

    public function send(string $payload, bool $async = true): bool
    {
        $this->sent[] = $async ? "async:{$payload}" : $payload;

        return $async;
    }

    /** @return list<string> */
    public function sentLog(): array
    {
        return $this->sent;
    }

    public function listAction(?string $filter = null, ?int $pager = null): string
    {
        return ($filter ?? 'all') . ':' . ($pager ?? 0);
    }

    /** @param array<mixed> $attributes */
    public function dispatch(string $model, array $attributes = [], ?string $relationship = null): bool
    {
        $this->sent[] = $model . ':' . count($attributes) . ':' . ($relationship ?? '');

        return $relationship !== null;
    }
}
