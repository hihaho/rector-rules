<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'name' => 'admin.'], function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});

-----
<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::middleware('web')->prefix('admin')->name('admin.')->group(function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});
