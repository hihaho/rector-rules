<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\Shadow;

// A non-Illuminate trait supplies newCollection() — the detector reports a shadow.
final class ShadowedByTrait
{
    use SuppliesNewCollectionTrait;
}
