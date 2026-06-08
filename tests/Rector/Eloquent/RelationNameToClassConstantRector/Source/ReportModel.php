<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source;

// Intentionally not final: a protected constant in a non-final class is kept by
// Rector's dead-code pass (a subclass might use it), so this test material survives
// `rector process`. It exercises the rule's public-only constant filter.
class ReportModel
{
    protected const string SECTIONS = 'sections';
}
