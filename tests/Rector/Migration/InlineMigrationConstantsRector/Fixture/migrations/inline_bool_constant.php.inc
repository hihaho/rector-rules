<?php

namespace migrations;

use Hihaho\RectorRules\Tests\Rector\Migration\InlineMigrationConstantsRector\Source\VideoModel;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('videos', function (Blueprint $table): void {
    $table->boolean('indexed')->default(VideoModel::INDEXED_BY_DEFAULT);
});

-----
<?php

namespace migrations;

use Hihaho\RectorRules\Tests\Rector\Migration\InlineMigrationConstantsRector\Source\VideoModel;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('videos', function (Blueprint $table): void {
    $table->boolean('indexed')->default(true);
});
