<?php

declare(strict_types=1);

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Controllers\OrderController;
use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

// Internal endpoint: auth boundary is a literal `Authenticate::class` on the GROUP, in the
// base-StaticCall middleware form (`Route::middleware([...])->group()`). The resolver must
// collect base-segment middleware, so this route classifies INTERNAL → to_const.
Route::middleware([Authenticate::class])->group(function (): void {
    Route::post('/internal/orders', [OrderController::class, 'store'])->name('orders.store');
});

// Public endpoint: `web` group only, no Authenticate token → PUBLIC → to_literal.
Route::middleware('web')->group(function (): void {
    Route::post('/orders', [OrderController::class, 'store'])->name('public.orders.store');
});
