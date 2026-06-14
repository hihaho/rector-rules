<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\Routing\MiddlewareStringToClassRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');

    // Enable all seven aliases explicitly — including `auth` and `guest`, which the
    // rule excludes from its DEFAULT convert-set. The fixtures in this suite exercise
    // the conversion *mechanics* (multi-guard, array form, variadic, static call,
    // withoutMiddleware), several of which use `auth`; the default-policy behaviour
    // (auth/guest skipped unless opted in) is covered separately by
    // MiddlewareStringToClassDefaultAliasesTest.
    $rectorConfig->ruleWithConfiguration(MiddlewareStringToClassRector::class, [
        MiddlewareStringToClassRector::ALIASES => [
            'auth', 'auth.basic', 'can', 'guest', 'password.confirm', 'signed', 'verified',
        ],
    ]);
};
