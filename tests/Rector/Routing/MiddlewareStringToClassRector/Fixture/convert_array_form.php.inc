<?php

use Illuminate\Support\Facades\Route;

Route::get('/posts', 'PostController@index')->middleware(['auth:sanctum', 'web', 'fortify.guard']);
?>
-----
<?php

use Illuminate\Support\Facades\Route;

Route::get('/posts', 'PostController@index')->middleware([\Illuminate\Auth\Middleware\Authenticate::using('sanctum'), 'web', 'fortify.guard']);
?>
