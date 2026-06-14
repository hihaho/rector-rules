<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->middleware('throttle:60,1');
?>
-----
<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->middleware(\Illuminate\Routing\Middleware\ThrottleRequests::with(60, 1));
?>
