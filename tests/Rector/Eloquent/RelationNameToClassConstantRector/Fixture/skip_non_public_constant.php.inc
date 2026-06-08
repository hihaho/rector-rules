<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\ReportModel;

// The only matching constant is protected — emitting ReportModel::SECTIONS would
// be a fatal access error from outside the class, so the string is left alone.
function loadReportSections(ReportModel $report): void
{
    $report->loadMissing('sections');
}
