<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

class SomeService
{
    public function run(): string
    {
        return $this?->plain();
    }

    public function plain(): string
    {
        return '';
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

class SomeService
{
    public function run(): string
    {
        return $this->plain();
    }

    public function plain(): string
    {
        return '';
    }
}
