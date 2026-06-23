<?php

declare(strict_types=1);

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Controllers\InvokableController;
use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Controllers\OrderController;
use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Middleware\Authenticate;
use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Middleware\SignedMiddleware;
use Illuminate\Support\Facades\Route;

// Case 1 — internal: bare Authenticate::class on the GROUP, base-StaticCall middleware form.
Route::middleware([Authenticate::class])->group(function (): void {
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
});

// Case 2 — public: Authenticate::using('api') is a StaticCall, not a ::class fetch, so it is
// opaque and contributes no token (the booted-equivalence contract regression guard).
Route::middleware([Authenticate::using('api')])->group(function (): void {
    Route::post('/api/orders', [OrderController::class, 'store'])->name('api.store');
});

// Case 3 — public: a 'web' string-alias group, no Authenticate.
Route::middleware('web')->group(function (): void {
    Route::post('/web/orders', [OrderController::class, 'store'])->name('web.store');
});

// Cases 4 & 5 — nested inheritance: web → Authenticate::class → route is internal (inherits the
// inner group's token); a sibling route directly under web is public.
Route::middleware('web')->group(function (): void {
    Route::middleware([Authenticate::class])->group(function (): void {
        Route::post('/nested/internal', [OrderController::class, 'store'])->name('nested.internal.store');
    });

    Route::post('/nested/public', [OrderController::class, 'store'])->name('nested.public.store');
});

// Case 6 — public: a mixed middleware array with a non-Authenticate ::class token and a
// ::using static call — neither is the configured internal middleware.
Route::middleware([SignedMiddleware::class, SignedMiddleware::using('relative')])->group(function (): void {
    Route::post('/signed/orders', [OrderController::class, 'store'])->name('mixed.store');
});

// Portability — string-alias boundary: a `'auth'` string is read as a token, but only marks
// the route internal when 'auth' is listed in the internal-middleware config. With hihaho's
// FQCN-only config it stays public; an alias-based app lists 'auth' and it classifies internal.
Route::middleware('auth')->group(function (): void {
    Route::post('/aliased/orders', [OrderController::class, 'store'])->name('alias.store');
});

// match() verb — the action argument is shifted by one ($methods, $uri, $action); the
// resolver must offset it to find the FormRequest.
Route::middleware([Authenticate::class])->group(function (): void {
    Route::match(['put', 'patch'], '/match/orders', [OrderController::class, 'store'])->name('match.store');
});

// Invokable controller — a bare Controller::class action resolves to its __invoke method.
Route::middleware('web')->group(function (): void {
    Route::post('/invokable/orders', InvokableController::class)->name('invoke.store');
});

// Array-config group form — Route::group(['middleware' => [...]], fn); the internal token is
// read from the config array's 'middleware' key (supported for adopters; hihaho uses fluent).
Route::group(['middleware' => [Authenticate::class]], function (): void {
    Route::post('/array-config/orders', [OrderController::class, 'store'])->name('arrayconfig.store');
});
