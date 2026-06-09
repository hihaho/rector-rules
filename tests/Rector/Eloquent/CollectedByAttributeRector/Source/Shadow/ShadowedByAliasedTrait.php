<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\Shadow;

// A trait method aliased to newCollection() (mixed case) — the detector reports a shadow.
final class ShadowedByAliasedTrait
{
    use AliasableCollectionTrait {
        buildCollection as NewCollection;
    }
}
