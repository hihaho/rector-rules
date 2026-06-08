<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\FixtureTrustPhpDoc;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\PhpDocModel;

// With trust_phpdoc_types: true, the @property Poster $poster non-nullability is
// trusted and the nullsafe is removed.
function viaPhpDoc(PhpDocModel $model): string
{
    return $model->poster?->original;
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\FixtureTrustPhpDoc;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\PhpDocModel;

// With trust_phpdoc_types: true, the @property Poster $poster non-nullability is
// trusted and the nullsafe is removed.
function viaPhpDoc(PhpDocModel $model): string
{
    return $model->poster->original;
}
