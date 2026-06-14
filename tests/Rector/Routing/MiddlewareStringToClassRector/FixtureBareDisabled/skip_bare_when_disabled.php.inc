<?php

use Illuminate\Support\Facades\Route;

// Bare `verified` (no parameters) is left untouched when CONVERT_BARE_ALIASES is off.
Route::middleware('verified')->group(function (): void {
});
