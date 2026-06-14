<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\ExternalClient;

// Cascade is enabled, but the callee is third-party: a name-coupled rename-to-drop is
// refused on vendor signatures, so the mid-positional [] stays.
function run(ExternalClient $client, string $relationship): bool
{
    return $client->dispatch('member', [], $relationship);
}
