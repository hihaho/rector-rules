<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Poster;

// receiver is a static call returning a nullable object, result assigned — the nullsafe IS needed, must stay
class PosterCache
{
    public static function find(): ?Poster
    {
        return null;
    }

    public function caption(): string
    {
        $caption = self::find()?->caption();

        return $caption ?? '';
    }
}
