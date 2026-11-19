<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\MultilineCallArgumentsRector\Source;

use DateTime;

/**
 * Inherits DateTime::setDate(), so a call to it still reaches a built-in.
 */
final class Schedule extends DateTime {}
