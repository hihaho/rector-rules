<?php

use Illuminate\Support\Facades\Route;

// `auth` is excluded from the default convert-set — an app may have remapped it to a
// custom Authenticate subclass, so converting to the framework class would change
// behaviour. Left untouched unless `auth` is listed explicitly in ALIASES.
Route::middleware('auth')->group(function (): void {
});
Route::get('/d', 'C@m')->middleware('auth:sanctum,web');
