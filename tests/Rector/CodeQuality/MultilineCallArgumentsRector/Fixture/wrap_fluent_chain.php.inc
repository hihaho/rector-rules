<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

function run(Builder $query, string $status): Builder
{
    return $query
        ->where("status", "=", $status)
        ->orderBy("id")
        ->select("id", "status", "total")
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
        ->select(
        
        "id",
        "status",
        "total"
    )
        ->limit(5);
}

?>
