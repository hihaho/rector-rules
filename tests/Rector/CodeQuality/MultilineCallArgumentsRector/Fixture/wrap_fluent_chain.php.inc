<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

function run(Builder $query, string $status): Builder
{
    return $query
        ->where("status", "=", $status)
        ->orderBy("id")
        ->whereBetween("total", 1, 10)
        ->limit(5);
}

?>
-----
<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

function run(Builder $query, string $status): Builder
{
    return $query
        ->where("status", "=", $status)
        ->orderBy("id")
        ->whereBetween(
        
        "total",
        1,
        10
    )
        ->limit(5);
}

?>
