<?php

namespace routes;

use Illuminate\Support\Facades\Route;

$path = 'about/';

Route::get($path, fn () => 'about');
