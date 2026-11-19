<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor;

use SplFileObject;

/**
 * Overrides SplFileObject::setCsvControl() with renamed parameters, outside the
 * first-party namespaces, so naming its arguments is not safe.
 */
final class TabFile extends SplFileObject
{
    public function setCsvControl(string $delimiter = "\t", string $quote = '"', string $escapeChar = '\\'): void
    {
        parent::setCsvControl($delimiter, $quote, $escapeChar);
    }
}
