<?php

namespace App;

final class Report
{
    private \Illuminate\Database\Eloquent\Builder $query;

    public function run(string $status): void
    {
        $this->query
            ->select("id", "status", $status);
    }
}

?>
