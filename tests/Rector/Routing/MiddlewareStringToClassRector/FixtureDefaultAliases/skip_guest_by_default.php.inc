<?php

use Illuminate\Support\Facades\Route;

// `guest` is excluded from the default convert-set for the same reason as `auth`:
// apps commonly remap it to a custom RedirectIfAuthenticated subclass.
Route::middleware('guest')->group(function (): void {
});
