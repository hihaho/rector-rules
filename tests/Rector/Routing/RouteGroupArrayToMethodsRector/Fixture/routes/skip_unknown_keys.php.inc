<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web', 'custom_option' => 'value'], function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});
