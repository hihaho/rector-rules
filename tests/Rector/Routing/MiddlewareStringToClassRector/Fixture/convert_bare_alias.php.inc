<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (): void {
});
?>
-----
<?php

use Illuminate\Support\Facades\Route;

Route::middleware(\Illuminate\Auth\Middleware\Authenticate::class)->group(function (): void {
});
?>
