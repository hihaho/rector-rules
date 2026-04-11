<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});
