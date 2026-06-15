<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty;

// Inherits signature() from Repository without overriding it — a call on this subclass
// resolves to Repository as the declaring class, so excluding Repository::signature
// covers it too.
final class ExtendedRepository extends Repository {}
