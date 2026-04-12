<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::group(['scope_bindings' => false, 'prefix' => 'admin'], function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});

-----
<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::withoutScopedBindings()->prefix('admin')->group(function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});
