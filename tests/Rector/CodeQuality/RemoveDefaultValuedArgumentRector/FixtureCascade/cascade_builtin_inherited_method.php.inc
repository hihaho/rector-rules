<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\CsvFile;

function run(CsvFile $file): void
{
    $file->setCsvControl(',', '"', '');
}

?>
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\CsvFile;

function run(CsvFile $file): void
{
    $file->setCsvControl(escape: '');
}

?>
