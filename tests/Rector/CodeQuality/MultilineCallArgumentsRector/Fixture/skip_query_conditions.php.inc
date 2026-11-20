<?php

namespace App;

use App\Models\Order;
use Hihaho\RectorRules\Tests\Rector\CodeQuality\MultilineCallArgumentsRector\Source\Article;
use Illuminate\Database\Eloquent\Builder;

function run(Builder $query, ?Builder $other, string $status): void
{
    $query->where('status', '!=', $status);
    $query->orWhere('total', '>', 10);
    $query->whereDate('created_at', '>=', '2026-01-01');
    $query->WHERE('status', '=', $status);
    $other?->where('status', '=', $status);
    Order::where('status', '=', $status);
    Article::where('status', '=', $status);
    $query->orWhereNotLike('name', '%test%', true);
    $query->whereRelation('items', 'status', '=', $status);
    $query->having('total', '>', 100);
    $query->orHaving('total', '<', 10);
    $query->join('orders', 'orders.user_id', '=', 'users.id');
    $query->leftJoin('orders', 'orders.user_id', '=', 'users.id');
    $query->crossJoinSub($other, 'totals', 'totals.id', 'users.id');
    $query->where('id', '=', format_line($status, 1, 2));
    collect([])->where('total', '>', 10);
}

?>
