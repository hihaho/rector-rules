<?php

namespace App;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

final class Formatter
{
    public function wrap(string $text, string $before, string $after): string
    {
        return $before . $text . $after;
    }
}

function run(ResponseFactory $responses, Formatter $formatter, string $body): mixed
{
    // An interface method: the class that runs is chosen at runtime.
    $responses->view('welcome', [], 200);

    // Forwarded through __callStatic or __call.
    Cache::put('key', $body, 60);
    cache()->put('key', $body, 60);

    // Not a vendor method.
    $formatter->wrap($body, '<p>', '</p>');

    // Below the minimum.
    return Str::limit($body, 100);
}

?>
