<?php

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('signed', only: ['store']),
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
            new Middleware(\Illuminate\Routing\Middleware\ValidateSignature::class, only: ['store']),
        ];
    }
}
?>
