<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\Shadow;

// The ancestor declares no newCollection() — nothing shadows the attribute.
final class NotShadowedByPlainAncestor extends PlainAncestor {}
