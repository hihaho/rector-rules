<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::get('', fn () => 'root');
Route::post('', fn () => 'root');

-----
<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => 'root');
Route::post('/', fn () => 'root');
