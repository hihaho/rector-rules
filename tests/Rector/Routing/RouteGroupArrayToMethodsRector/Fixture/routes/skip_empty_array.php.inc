<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::group([], function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});
