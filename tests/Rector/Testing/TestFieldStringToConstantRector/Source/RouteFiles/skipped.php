<?php

declare(strict_types=1);

use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Controllers\OrderController;
use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Controllers\PlainController;
use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Middleware\Authenticate;
use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Middleware\SignedMiddleware;
use Illuminate\Support\Facades\Route;

// Control — a valid internal route, so the omissions below are proven (this file parsed).
Route::middleware([Authenticate::class])->group(function (): void {
    Route::post('/control', [OrderController::class, 'store'])->name('present.control');
});

// Case 7 — dynamic middleware: the stack is built from a variable, so the runtime set is
// unknown. Even though it literally holds Authenticate::class, the route is OMITTED, not
// guessed — misclassifying an internal route public would let to_literal strip a constant.
$dynamicMiddleware = [Authenticate::class];
Route::middleware($dynamicMiddleware)->group(function (): void {
    Route::post('/dynamic', [OrderController::class, 'store'])->name('skip.dynamic');
});

// Case 8 — non-constant route name → omitted.
$routeName = 'skip.name';
Route::post('/named', [OrderController::class, 'store'])->name($routeName);

// Case 9 — action takes no FormRequest parameter → omitted.
Route::post('/plain', [PlainController::class, 'index'])->name('skip.noform');

// F1 — non-::class const-referenced middleware: SignedMiddleware::ALIAS has an unknown value
// statically (could be any middleware, even the auth one), so the route is omitted, not guessed.
Route::middleware([SignedMiddleware::ALIAS])->group(function (): void {
    Route::post('/const-middleware', [OrderController::class, 'store'])->name('skip.const.middleware');
});
