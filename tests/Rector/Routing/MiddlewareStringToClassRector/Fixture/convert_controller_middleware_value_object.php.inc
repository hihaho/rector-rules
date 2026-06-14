<?php

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('signed'),
            new Middleware('verified:notice'),
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
            new Middleware(\Illuminate\Routing\Middleware\ValidateSignature::class),
            new Middleware(\Illuminate\Auth\Middleware\EnsureEmailIsVerified::redirectTo('notice')),
        ];
    }
}
?>
