<?php

namespace App;

use Illuminate\Database\Query\Builder;

function run(Builder $query, string $status): Builder
{
    return $query->where('status', '!=', $status);
}

?>
-----
<?php

namespace App;

use Illuminate\Database\Query\Builder;

function run(Builder $query, string $status): Builder
{
    return $query->where(column: 'status', operator: '!=', value: $status);
}

?>
