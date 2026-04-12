<?php

namespace migrations;

use Hihaho\RectorRules\Tests\Rector\Migration\InlineMigrationConstantsRector\Source\VideoModel;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('videos', function (Blueprint $table): void {
    $table->string('legacy')->default(VideoModel::LEGACY_FIELD);
});

-----
<?php

namespace migrations;

use Hihaho\RectorRules\Tests\Rector\Migration\InlineMigrationConstantsRector\Source\VideoModel;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('videos', function (Blueprint $table): void {
    $table->string('legacy')->default(null);
});
