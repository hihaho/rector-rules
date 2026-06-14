<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->middleware('verified:verification.notice');
?>
-----
<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->middleware(\Illuminate\Auth\Middleware\EnsureEmailIsVerified::redirectTo('verification.notice'));
?>
