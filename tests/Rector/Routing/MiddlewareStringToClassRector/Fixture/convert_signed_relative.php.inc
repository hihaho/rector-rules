<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->middleware('signed:relative');
?>
-----
<?php

use Illuminate\Support\Facades\Route;

Route::get('/d', 'C@m')->middleware(\Illuminate\Routing\Middleware\ValidateSignature::relative());
?>
