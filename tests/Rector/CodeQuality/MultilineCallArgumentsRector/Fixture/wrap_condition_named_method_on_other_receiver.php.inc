<?php

namespace App;

use Illuminate\Support\Arr;

final class Report
{
    public function run(array $items, string $status): string
    {
        $this->whereStatus($items, $status, true);

        return Arr::join($items, ', ', ' and ');
    }

    private function whereStatus(array $items, string $status, bool $strict): void
    {
    }
}

?>
-----
<?php

namespace App;

use Illuminate\Support\Arr;

final class Report
{
    public function run(array $items, string $status): string
    {
        $this->whereStatus(
            
            $items,
            $status,
            true
        );

        return Arr::join(
            
            $items,
            ', ',
            ' and '
        );
    }

    private function whereStatus(array $items, string $status, bool $strict): void
    {
    }
}

?>
