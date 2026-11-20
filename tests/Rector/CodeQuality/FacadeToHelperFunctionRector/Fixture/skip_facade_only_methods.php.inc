<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

final class ReportTest
{
    public function run(): void
    {
        // Methods declared on the facade itself exist only there.
        Cache::shouldReceive('get')->andReturn(1);
        Cache::spy();
        Cache::swap(new \stdClass());
        Auth::routes();
        Log::spy();
        Log::shouldHaveReceived('info')->once();
        Log::shouldNotHaveReceived('error');

        // Resolved on each call, not once when the closure is made.
        $getter = Cache::get(...);

        // Typed with a contract or a stricter signature than the facade's docblock.
        Validator::make([], []);
        Cookie::make('name', 'value');

        // No matching helper.
        DB::table('orders')->count();
        Storage::disk('local');

        // A class that shares a facade's short name.
        \Illuminate\Http\Request::capture();
    }
}

?>
