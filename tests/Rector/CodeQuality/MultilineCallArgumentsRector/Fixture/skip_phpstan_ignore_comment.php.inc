<?php

namespace App;

final class Mapper
{
    public function run(object $relation, array $items, array $children, string $key): void
    {
        // @phpstan-ignore argument.type
        $relation->match($items, $children, $key);

        /** @phpstan-ignore-next-line */
        $relation->match($items, $children, $key);

        $relation->match($items, $children, $key); // @phpstan-ignore argument.type

        /**
         * @phpstan-ignore argument.type
         */
        $relation->match($items, $children, $key);

        $result = [
            // @phpstan-ignore argument.type
            'value' => $relation->match($items, $children, $key),
        ];
    }
}

?>
