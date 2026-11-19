<?php

namespace App;



function run($invoice): mixed
{
    return $invoice->addLine('Shipping', 500, 'flat rate');
}
