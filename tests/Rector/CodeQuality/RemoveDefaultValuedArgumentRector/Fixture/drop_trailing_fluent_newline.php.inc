<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\FluentBuilder;

function run(): string
{
    return FluentBuilder::make()
        ->columns(2)
        ->build();
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\FluentBuilder;

function run(): string
{
    return FluentBuilder::make()
        ->columns()
        ->build();
}
