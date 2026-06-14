<?php

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(only: ['store'], middleware: 'signed'),
        ];
    }
}
?>
-----
<?php

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(only: ['store'], middleware: \Illuminate\Routing\Middleware\ValidateSignature::class),
        ];
    }
}
?>
