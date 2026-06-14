<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\Routing\MiddlewareStringToClassRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');

    // Empty configuration → the rule's DEFAULT convert-set, which excludes `auth` and
    // `guest`. Used by MiddlewareStringToClassDefaultAliasesTest to prove the default
    // skips those two while still converting the behaviour-safe aliases.
    $rectorConfig->ruleWithConfiguration(MiddlewareStringToClassRector::class, []);
};
