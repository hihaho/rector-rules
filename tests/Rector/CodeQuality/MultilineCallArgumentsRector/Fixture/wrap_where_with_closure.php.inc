<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

function run(Builder $query, int $minimum): void
{
    $query->whereHas('items', fn (Builder $items) => $items->where('active', true), '>=', $minimum);
    $query->whereMonth('created_at', '=', 3, 'or');
}

?>
-----
<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

function run(Builder $query, int $minimum): void
{
    $query->whereHas(
        
        'items',
        fn (Builder $items) => $items->where('active', true),
        '>=',
        $minimum
    );
    $query->whereMonth('created_at', '=', 3, 'or');
}

?>
