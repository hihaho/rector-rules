<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->middleware('throttle:api');
?>
-----
<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->middleware(\Illuminate\Routing\Middleware\ThrottleRequests::using('api'));
?>
