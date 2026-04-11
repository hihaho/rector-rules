<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::get('about/', fn () => 'about');
Route::put('users/', fn () => 'users');

-----
<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::get('about', fn () => 'about');
Route::put('users', fn () => 'users');
