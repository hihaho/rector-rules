<?php

namespace migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// unsignedTinyInteger is intentionally out of scope (0-255 range would be lost).
Schema::table('articles', function (Blueprint $table): void {
    $table->unsignedTinyInteger('is_enabled')->default(1);
});
