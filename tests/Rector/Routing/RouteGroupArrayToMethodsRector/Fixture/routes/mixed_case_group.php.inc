<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::GROUP(['as' => 'admin.', 'prefix' => 'admin'], function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});
-----
<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::name('admin.')
    ->prefix('admin')
    ->group(function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});
