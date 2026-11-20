<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

function run(Builder $query, string $status): Builder
{
    return $query
        ->orderBy("id")
        // Only the columns the export needs.
        ->select("id", "status", "total")
        /* And the totals per status. */
        ->addSelect("subtotal", "tax", "discount");
}

function inline(Builder $query): Builder
{
    return $query->orderBy("id") /* Export columns. */ ->select("id", "status", "total");
}

function trailing(Builder $query): Builder
{
    return $query->select("id" /* key */, "status", "total");
}

?>
