<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\FluentBuilder;

function run(FluentBuilder $builder): string
{
    return $builder->init('header')
        ->columns(2)
        ->build();
}
-----
<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\Source\Vendor\FluentBuilder;

function run(FluentBuilder $builder): string
{
    return $builder->init('header')
        ->columns()
        ->build();
}
