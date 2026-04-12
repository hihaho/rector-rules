<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::group(['web', 'auth'], function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});
