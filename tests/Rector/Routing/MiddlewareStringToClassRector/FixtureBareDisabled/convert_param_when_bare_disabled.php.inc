<?php

use Illuminate\Support\Facades\Route;

// `verified` is in the default convert-set; with CONVERT_BARE_ALIASES disabled the
// parametrized form still converts (only the bare form is left alone).
Route::middleware('verified:verification.notice')->group(function (): void {
});
?>
-----
<?php

use Illuminate\Support\Facades\Route;

// `verified` is in the default convert-set; with CONVERT_BARE_ALIASES disabled the
// parametrized form still converts (only the bare form is left alone).
Route::middleware(\Illuminate\Auth\Middleware\EnsureEmailIsVerified::redirectTo('verification.notice'))->group(function (): void {
});
?>
