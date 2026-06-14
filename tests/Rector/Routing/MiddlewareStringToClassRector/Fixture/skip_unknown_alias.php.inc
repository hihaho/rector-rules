<?php

use Illuminate\Support\Facades\Route;

Route::middleware('fortify.guard')->group(function (): void {
});
Route::get('/d', 'C@m')->middleware('role:admin');
