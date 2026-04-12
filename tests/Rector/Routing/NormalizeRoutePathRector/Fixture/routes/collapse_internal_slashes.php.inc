<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::get('users//show//{id}', fn () => 'show');
Route::get('//api///v1//health//', fn () => 'health');
Route::get('///', fn () => 'root');

-----
<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::get('users/show/{id}', fn () => 'show');
Route::get('api/v1/health', fn () => 'health');
Route::get('/', fn () => 'root');
