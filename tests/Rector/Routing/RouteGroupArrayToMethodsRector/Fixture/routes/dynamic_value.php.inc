<?php

namespace routes;

use Illuminate\Support\Facades\Route;

$prefix = 'admin';

Route::group(['prefix' => $prefix], function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});

-----
<?php

namespace routes;

use Illuminate\Support\Facades\Route;

$prefix = 'admin';

Route::prefix($prefix)
    ->group(function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});
