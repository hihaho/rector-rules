<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->middleware('auth:sanctum', 'web', 'verified');
?>
-----
<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->middleware(\Illuminate\Auth\Middleware\Authenticate::using('sanctum'), 'web', \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class);
?>
