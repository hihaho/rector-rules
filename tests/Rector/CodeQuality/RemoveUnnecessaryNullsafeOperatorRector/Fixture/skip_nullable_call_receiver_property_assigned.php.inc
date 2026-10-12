<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Poster;

// nullsafe property fetch on a nullable call, assigned to a local — the nullsafe IS needed, must stay
class PosterOriginal
{
    public function find(): ?Poster
    {
        return null;
    }

    public function original(): string
    {
        $original = $this->find()?->original;

        return $original ?? '';
    }
}
