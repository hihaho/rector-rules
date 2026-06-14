<?php

use Illuminate\Support\Facades\Route;

Route::get('/posts', 'PostController@index')->middleware('can:viewAny,post');
?>
-----
<?php

use Illuminate\Support\Facades\Route;

Route::get('/posts', 'PostController@index')->middleware(\Illuminate\Auth\Middleware\Authorize::using('viewAny', 'post'));
?>
