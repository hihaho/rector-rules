<?php

namespace migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('questions', function (Blueprint $table): void {
    $table->tinyInteger('enable_answer_image_zoom')->default(1);
});
-----
<?php

namespace migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('questions', function (Blueprint $table): void {
    $table->boolean('enable_answer_image_zoom')->default(true);
});
