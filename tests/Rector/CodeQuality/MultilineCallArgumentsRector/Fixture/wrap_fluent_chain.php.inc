<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

function run(Builder $query, string $status): Builder
{
    return $query
        ->where("status", "=", $status)
        ->orderBy("id")
        ->join("orders", "orders.user_id", "users.id")
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
        ->join(
        
        "orders",
        "orders.user_id",
        "users.id"
    )
        ->limit(5);
}

?>
