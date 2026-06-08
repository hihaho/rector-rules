<?php

namespace migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('articles', function (Blueprint $table): void {
    $table->tinyInteger('is_explicit', false)->default(1);
    $table->tinyInteger(column: 'is_named', autoIncrement: false)->default(1);
});
