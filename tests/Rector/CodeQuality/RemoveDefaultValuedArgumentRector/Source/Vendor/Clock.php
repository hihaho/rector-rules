<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor;

use DateTime;

/**
 * Inherits DateTime::setTime(), so its parameter names are the built-in ones.
 */
final class Clock extends DateTime {}
