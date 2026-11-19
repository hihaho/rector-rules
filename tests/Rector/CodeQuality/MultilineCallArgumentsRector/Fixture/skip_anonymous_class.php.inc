<?php

namespace App;

function run(string $name, int $total): object
{
    return new class ($name, $total, true) {
        public function __construct(public string $name, public int $total, public bool $active)
        {
        }
    };
}

?>
