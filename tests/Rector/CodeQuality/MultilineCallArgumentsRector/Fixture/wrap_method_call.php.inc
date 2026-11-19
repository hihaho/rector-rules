<?php

namespace App;

final class Greeter
{
    public function run(string $first, string $middle, string $last): string
    {
        return $this->formatName(first: $first, middle: $middle, last: $last);
    }

    private function formatName(string $first, string $middle, string $last): string
    {
        return "{$first} {$middle} {$last}";
    }
}

?>
-----
<?php

namespace App;

final class Greeter
{
    public function run(string $first, string $middle, string $last): string
    {
        return $this->formatName(
            
            first: $first,
            middle: $middle,
            last: $last
        );
    }

    private function formatName(string $first, string $middle, string $last): string
    {
        return "{$first} {$middle} {$last}";
    }
}

?>
