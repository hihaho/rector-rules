<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::group(['scope_bindings' => true, 'prefix' => 'admin'], function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});

-----
<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::scopeBindings(true)->prefix('admin')->group(function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});
