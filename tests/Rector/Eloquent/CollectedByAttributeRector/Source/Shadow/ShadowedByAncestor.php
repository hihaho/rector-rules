<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\Shadow;

// An ancestor declares newCollection() — the detector reports a shadow.
final class ShadowedByAncestor extends AncestorWithNewCollection {}
