<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::get('/about', fn () => 'about');
Route::post('/users/create', fn () => 'create');

-----
<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::get('about', fn () => 'about');
Route::post('users/create', fn () => 'create');
