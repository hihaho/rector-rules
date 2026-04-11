<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::group(['domain' => '{account}.example.com', 'middleware' => 'auth'], function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});

-----
<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::domain('{account}.example.com')->middleware('auth')->group(function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});
