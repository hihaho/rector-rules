<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor;

use SplFileObject;

/**
 * Inherits SplFileObject::setCsvControl(), so its parameter names are the built-in ones.
 */
final class CsvFile extends SplFileObject {}
