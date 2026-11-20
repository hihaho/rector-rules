<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

final class Report
{
    public function run(string $key): mixed
    {
        $value = Cache::remember($key, 60, fn () => 1);
        $name = Config::get('app.name');
        App::make(self::class);
        Log::info('done', ['key' => $key]);
        $id = Auth::id();
        $input = Request::input('page');
        $view = View::make('reports.show');
        Context::add('key', $key);

        return Response::json([$value, $name, $id, $input, $view]);
    }
}

?>
-----
<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

final class Report
{
    public function run(string $key): mixed
    {
        $value = cache()->remember($key, 60, fn () => 1);
        $name = config()->get('app.name');
        app()->make(self::class);
        logger()->info('done', ['key' => $key]);
        $id = auth()->id();
        $input = request()->input('page');
        $view = view()->make('reports.show');
        context()->add('key', $key);

        return response()->json([$value, $name, $id, $input, $view]);
    }
}

?>
