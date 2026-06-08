<?php

namespace migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('questions', function (Blueprint $table): void {
    $table->tinyInteger('should_loop')->nullable()->default(0);
});
-----
<?php

namespace migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('questions', function (Blueprint $table): void {
    $table->boolean('should_loop')->nullable()->default(false);
});
