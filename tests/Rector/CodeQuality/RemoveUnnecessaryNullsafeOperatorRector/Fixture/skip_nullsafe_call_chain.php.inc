<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Poster;

// nullsafe call chain on a nullable root — every nullsafe in the chain stays, as for chain_nullable_root
class PosterSource
{
    public function make(): Poster
    {
        return new Poster();
    }
}

function chainCaption(?PosterSource $source): ?string
{
    $caption = $source?->make()?->caption();

    return $caption;
}
