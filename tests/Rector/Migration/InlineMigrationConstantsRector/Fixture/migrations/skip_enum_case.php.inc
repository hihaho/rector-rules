<?php

namespace migrations;

use Hihaho\RectorRules\Tests\Rector\Migration\InlineMigrationConstantsRector\Source\VideoStatus;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('videos', function (Blueprint $table): void {
    $table->string('status')->default(VideoStatus::Active->value);
});
