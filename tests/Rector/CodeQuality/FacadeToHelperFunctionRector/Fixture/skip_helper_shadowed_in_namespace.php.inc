<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FacadeToHelperFunctionRector\Source\Shadow;

use Illuminate\Support\Facades\Cache;

// An unqualified cache() here would call the namespace's own cache() function.
function run(): mixed
{
    return Cache::get('key');
}

?>
