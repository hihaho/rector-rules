<?php

namespace migrations;

use Hihaho\RectorRules\Tests\Rector\Migration\InlineMigrationConstantsRector\Source\VideoModel;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('videos', function (Blueprint $table): void {
    $table->boolean(VideoModel::CALIPER_ENABLED)->nullable();
    $table->string(VideoModel::STATUS);
});

-----
<?php

namespace migrations;

use Hihaho\RectorRules\Tests\Rector\Migration\InlineMigrationConstantsRector\Source\VideoModel;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('videos', function (Blueprint $table): void {
    $table->boolean('caliper_enabled')->nullable();
    $table->string('status');
});
