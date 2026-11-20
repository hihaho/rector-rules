<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\Concerns;

trait ResolvesTokens
{
    public function token(string $platform): ?string
    {
        return $this->lookup($platform, false) ?? $this->fallback($platform, true);
    }

    private function lookup(string $platform, bool $inherit): ?string
    {
        return $inherit ? $platform : null;
    }

    protected function fallback(string $platform, bool $inherit): ?string
    {
        return $inherit ? $platform : null;
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\Concerns;

trait ResolvesTokens
{
    public function token(string $platform): ?string
    {
        return $this->lookup($platform, inherit: false) ?? $this->fallback($platform, true);
    }

    private function lookup(string $platform, bool $inherit): ?string
    {
        return $inherit ? $platform : null;
    }

    protected function fallback(string $platform, bool $inherit): ?string
    {
        return $inherit ? $platform : null;
    }
}
