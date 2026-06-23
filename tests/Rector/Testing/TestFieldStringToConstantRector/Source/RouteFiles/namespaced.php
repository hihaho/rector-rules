<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Controllers;

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

// A non-braced `namespace …;` declaration wraps every following statement in a single
// Stmt\Namespace_ node. The resolver must descend into it — otherwise a whole namespaced
// route file contributes zero routes. An unqualified `OrderController::class` resolves within
// this namespace (the real Source controller), mirroring a typical app route file.
Route::middleware([Authenticate::class])->group(function (): void {
    Route::post('/namespaced/orders', [OrderController::class, 'store'])->name('namespaced.store');
});
