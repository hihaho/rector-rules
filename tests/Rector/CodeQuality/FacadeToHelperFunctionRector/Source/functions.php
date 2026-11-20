<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FacadeToHelperFunctionRector\Source\Shadow;

/**
 * Shadows the global cache() helper for code in this namespace.
 */
function cache(string $key): string
{
    return $key;
}
