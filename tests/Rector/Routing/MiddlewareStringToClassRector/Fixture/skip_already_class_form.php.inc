<?php

use Illuminate\Support\Facades\Route;

Route::middleware(\Illuminate\Auth\Middleware\Authenticate::using('web'))->group(function (): void {
});
