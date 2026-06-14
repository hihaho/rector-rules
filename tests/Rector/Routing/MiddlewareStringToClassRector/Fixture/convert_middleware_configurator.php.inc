<?php

use Illuminate\Foundation\Configuration\Middleware;

function configure(Middleware $middleware): void
{
    $middleware->append('signed');
    $middleware->prepend('verified:notice');
    $middleware->group('web', ['signed', 'web']);
}
?>
-----
<?php

use Illuminate\Foundation\Configuration\Middleware;

function configure(Middleware $middleware): void
{
    $middleware->append(\Illuminate\Routing\Middleware\ValidateSignature::class);
    $middleware->prepend(\Illuminate\Auth\Middleware\EnsureEmailIsVerified::redirectTo('notice'));
    $middleware->group('web', [\Illuminate\Routing\Middleware\ValidateSignature::class, 'web']);
}
?>
