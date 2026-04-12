<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

final class ReportBuilder
{
    /** @param array<int, mixed> $items */
    public function build(array $items): void
    {
        /** @var Collection<int, \App\Models\Report> $items */
        foreach ($items as $item) {
            $item->render();
        }
    }
}

-----
<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;

final class ReportBuilder
{
    /** @param array<int, mixed> $items */
    public function build(array $items): void
    {
        /** @var EloquentCollection<int, \App\Models\Report> $items */
        foreach ($items as $item) {
            $item->render();
        }
    }
}
