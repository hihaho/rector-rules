<?php

namespace migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('users', function (Blueprint $table): void {
    $table->after('name', function (Blueprint $table): void {
        $table->string('nickname');
        $table->string('handle');
    });
});
