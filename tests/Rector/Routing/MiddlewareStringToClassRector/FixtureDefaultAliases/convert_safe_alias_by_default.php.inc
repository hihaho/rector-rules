<?php

use Illuminate\Support\Facades\Route;

// A behaviour-safe alias still converts under the default convert-set.
Route::get('/d', 'C@m')->middleware('signed:relative');
?>
-----
<?php

use Illuminate\Support\Facades\Route;

// A behaviour-safe alias still converts under the default convert-set.
Route::get('/d', 'C@m')->middleware(\Illuminate\Routing\Middleware\ValidateSignature::relative());
?>
