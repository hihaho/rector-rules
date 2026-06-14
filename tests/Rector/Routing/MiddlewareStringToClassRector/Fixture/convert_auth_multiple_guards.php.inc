<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum,web')->group(function (): void {
});
?>
-----
<?php

use Illuminate\Support\Facades\Route;

Route::middleware(\Illuminate\Auth\Middleware\Authenticate::using('sanctum', 'web'))->group(function (): void {
});
?>
