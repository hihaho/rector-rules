<?php

namespace migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('articles', function (Blueprint $table): void {
    $table->TinyInteger('is_featured')->Default(false);
});
-----
<?php

namespace migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('articles', function (Blueprint $table): void {
    $table->boolean('is_featured')->Default(false);
});
