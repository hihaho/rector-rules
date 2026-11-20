<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

final class ReportTest
{
    public function run(): void
    {
        // Methods declared on the facade itself exist only there.
        Cache::shouldReceive('get')->andReturn(1);
        Cache::spy();
        Cache::swap(new \stdClass());
        Auth::routes();

        // No matching helper.
        DB::table('orders')->count();
        Storage::disk('local');

        // A class that shares a facade's short name.
        \Illuminate\Http\Request::capture();
    }
}

?>
