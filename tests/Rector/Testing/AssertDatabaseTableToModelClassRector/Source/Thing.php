<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source;

// Resolves by name from the table `things`, but is NOT an Eloquent model → skip.
final class Thing {}
