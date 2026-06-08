<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Poster;

// receiver is a method call returning a non-null object (the case the core
// CleanupUnneededNullsafeOperatorRector also handles) — converted here too
class PosterFactory
{
    public function make(): Poster
    {
        return new Poster();
    }

    public function caption(): string
    {
        return $this->make()?->caption();
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Poster;

// receiver is a method call returning a non-null object (the case the core
// CleanupUnneededNullsafeOperatorRector also handles) — converted here too
class PosterFactory
{
    public function make(): Poster
    {
        return new Poster();
    }

    public function caption(): string
    {
        return $this->make()->caption();
    }
}
