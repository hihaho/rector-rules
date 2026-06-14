<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::GET('/about/', fn () => 'about');
-----
<?php

namespace routes;

use Illuminate\Support\Facades\Route;

Route::GET('about', fn () => 'about');
