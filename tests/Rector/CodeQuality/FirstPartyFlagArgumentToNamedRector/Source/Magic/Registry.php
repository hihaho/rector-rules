<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\Magic;

/**
 * Host with an extension-only dynamic property: there is no declared `tokens`
 * property and deliberately no typed `@property` docblock for it, so bare PHPStan
 * types `$registry->tokens` as the `__get` return (`mixed`). Only the registered
 * {@see MagicPropertyExtension} supplies the concrete type — mirroring a larastan
 * service/container accessor rather than a docblock-backed property.
 */
final class Registry
{
    /** @var array<string, mixed> */
    private array $services = [];

    public function __get(string $name): mixed
    {
        return $this->services[$name] ?? null;
    }
}
