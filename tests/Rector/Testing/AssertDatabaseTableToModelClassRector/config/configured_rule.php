<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\Testing\AssertDatabaseTableToModelClassRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $sourceNamespace = 'Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source';

    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->importNames();
    $rectorConfig->ruleWithConfiguration(AssertDatabaseTableToModelClassRector::class, [
        AssertDatabaseTableToModelClassRector::MODEL_NAMESPACE => $sourceNamespace,
        AssertDatabaseTableToModelClassRector::TABLE_TO_MODEL => [
            // Custom-table model the convention cannot reach — verified, then converted.
            'legacy_people' => $sourceNamespace . '\Person',
            // Stale entry: Post's table is 'blog_posts', not 'ghosts' → still skipped.
            'ghosts' => $sourceNamespace . '\Post',
        ],
    ]);
};
