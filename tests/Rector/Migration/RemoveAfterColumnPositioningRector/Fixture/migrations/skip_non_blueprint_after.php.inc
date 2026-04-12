<?php

namespace migrations;

use Illuminate\Support\Collection;

$items = new Collection([1, 2, 3]);
$next = $items->after(1);
