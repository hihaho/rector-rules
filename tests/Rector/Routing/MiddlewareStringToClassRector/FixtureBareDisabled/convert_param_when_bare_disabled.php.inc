<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function (): void {
});
?>
-----
<?php

use Illuminate\Support\Facades\Route;

Route::middleware(\Illuminate\Auth\Middleware\Authenticate::using('sanctum'))->group(function (): void {
});
?>
