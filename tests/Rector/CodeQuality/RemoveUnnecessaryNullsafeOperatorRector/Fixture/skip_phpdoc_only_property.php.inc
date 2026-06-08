<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\PhpDocModel;

// Non-nullability is phpdoc-only (@property). By default the native type is not
// trusted, so this is left alone — the guard against a stale @property causing a
// wrong removal. (Converted only under trust_phpdoc_types: true.)
function viaPhpDoc(PhpDocModel $model): string
{
    return $model->poster?->original;
}
