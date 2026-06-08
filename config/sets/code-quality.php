<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector;
use Hihaho\RectorRules\Rector\CodeQuality\NativeFunctionFlagArgumentToNamedRector;
use Hihaho\RectorRules\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rules([
        RemoveUnnecessaryNullsafeOperatorRector::class,
        NativeFunctionFlagArgumentToNamedRector::class,
        FirstPartyFlagArgumentToNamedRector::class,
    ]);
};
