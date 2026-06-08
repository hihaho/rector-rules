<?php

namespace migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('articles', function (Blueprint $table): void {
    $column = 'is_dynamic';
    $table->tinyInteger($column)->default(1);
});
