<?php

namespace migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('articles', function (Blueprint $table): void {
    $table->tinyInteger('is_primary', true)->default(1);
    $table->tinyInteger('is_secondary')->autoIncrement()->default(1);
});
