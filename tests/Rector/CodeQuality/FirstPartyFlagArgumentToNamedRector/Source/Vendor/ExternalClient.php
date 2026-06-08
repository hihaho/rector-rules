<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\Vendor;

final class ExternalClient
{
    public function send(string $payload, bool $async): bool
    {
        return $async;
    }
}
