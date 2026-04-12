<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/users/', fn () => 'users');
Route::redirect('/old/', '/new');
