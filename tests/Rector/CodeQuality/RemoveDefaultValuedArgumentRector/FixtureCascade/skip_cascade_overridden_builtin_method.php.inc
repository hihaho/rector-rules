<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\TabFile;

// TabFile overrides setCsvControl() with renamed parameters outside the first-party
// namespaces, so the arguments are not named.
function run(TabFile $file): void
{
    $file->setCsvControl("\t", '"', '');
}

?>
