<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\CodeQuality\RemoveDefaultValuedArgumentRector;
use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\ExtendedRepository;
use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\FirstParty\Repository;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->ruleWithConfiguration(RemoveDefaultValuedArgumentRector::class, [
        RemoveDefaultValuedArgumentRector::FIRST_PARTY_NAMESPACES => [
            'Hihaho\\RectorRules\\Tests\\Rector\\CodeQuality\\RemoveDefaultValuedArgumentRector\\Source\\FirstParty\\',
        ],
        RemoveDefaultValuedArgumentRector::EXCLUDE_CALLS => [
            // signature(): excluded via the base (declaring) class.
            Repository::class => ['signature'],
            // make(): excluded via the *subclass* that calls it, even though make() is
            // declared on Repository — exercises the called-class is-a match.
            ExtendedRepository::class => ['make'],
            // App\SelfFactory only exists in the self-static fixture; its self::make()
            // call resolves the enclosing class, exercising self/static resolution.
            'App\\SelfFactory' => ['make'],
        ],
    ]);
};
