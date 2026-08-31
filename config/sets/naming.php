<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\NamingClasses\AddCommandSuffixRector;
use Hihaho\RectorRules\Rector\NamingClasses\AddMailSuffixRector;
use Hihaho\RectorRules\Rector\NamingClasses\AddNotificationSuffixRector;
use Hihaho\RectorRules\Rector\NamingClasses\AddResourceSuffixRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    // Rename propagation for the suffix rules below. Also auto-included via
    // `extra.rector.includes`, but only when `rector/extension-installer` is present;
    // importing it here makes the set self-sufficient. Both paths are idempotent.
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->rules([
        AddCommandSuffixRector::class,
        AddMailSuffixRector::class,
        AddNotificationSuffixRector::class,
        AddResourceSuffixRector::class,
    ]);
};
