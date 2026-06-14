<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->middleware('signed:relative:extra');
