<?php

namespace migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('users', function (Blueprint $table): void {
    $table->string('description')->after('name');
    $table->boolean('active')->after('status')->default(true);
});

-----
<?php

namespace migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('users', function (Blueprint $table): void {
    $table->string('description');
    $table->boolean('active')->default(true);
});
