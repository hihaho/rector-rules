<?php

use Illuminate\Support\Facades\Route;

$middleware = 'auth:sanctum';
Route::get('/d', 'C@m')->middleware($middleware);
