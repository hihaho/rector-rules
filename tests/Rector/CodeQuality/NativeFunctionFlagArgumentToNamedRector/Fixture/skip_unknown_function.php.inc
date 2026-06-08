<?php

namespace App;

function customFlag($value, bool $flag): bool
{
    return $flag;
}

function run($value): bool
{
    return customFlag($value, true);
}
