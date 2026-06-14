<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->withoutMiddleware('auth:sanctum');
?>
-----
<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->withoutMiddleware(\Illuminate\Auth\Middleware\Authenticate::using('sanctum'));
?>
