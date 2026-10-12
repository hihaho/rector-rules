<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Poster;

// receiver is a call returning a nullable object, and the result is assigned and
// null-checked afterwards — the nullsafe IS needed, must stay
class PosterLookup
{
    public function find(): ?Poster
    {
        return null;
    }

    public function caption(): ?string
    {
        $caption = $this->find()?->caption();

        if ($caption === null) {
            return null;
        }

        return $caption;
    }
}
