<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->middleware('password.confirm:password.confirm,3600');
?>
-----
<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->middleware(\Illuminate\Auth\Middleware\RequirePassword::using('password.confirm', '3600'));
?>
