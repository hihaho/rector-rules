<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\NamingClasses\AddCommandSuffixRector;
use Hihaho\RectorRules\Rector\NamingClasses\AddMailSuffixRector;
use Hihaho\RectorRules\Rector\NamingClasses\AddNotificationSuffixRector;
use Hihaho\RectorRules\Rector\NamingClasses\AddResourceSuffixRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    // Rename propagation. Auto-included too, but only where `rector/extension-installer`
    // is allowed; importing it here makes the set self-sufficient.
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->rules([
        AddCommandSuffixRector::class,
        AddMailSuffixRector::class,
        AddNotificationSuffixRector::class,
        AddResourceSuffixRector::class,
    ]);
};
