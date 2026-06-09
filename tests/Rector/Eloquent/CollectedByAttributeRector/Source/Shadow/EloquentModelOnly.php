<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\Shadow;

use Illuminate\Database\Eloquent\Model;

// A real Eloquent model with no custom collection: its only newCollection() comes
// from the framework's Illuminate\HasCollection trait, which is the attribute
// mechanism, not a shadow. Verifies the Illuminate-namespace skip + Model break.
final class EloquentModelOnly extends Model {}
