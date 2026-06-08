<?php

namespace migrations;

use Hihaho\RectorRules\Tests\Rector\Migration\InlineMigrationConstantsRector\Source\ArticleModel;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('articles', function (Blueprint $table): void {
    $table->string('legacy')->default(ArticleModel::LEGACY_FIELD);
});

-----
<?php

namespace migrations;

use Hihaho\RectorRules\Tests\Rector\Migration\InlineMigrationConstantsRector\Source\ArticleModel;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('articles', function (Blueprint $table): void {
    $table->string('legacy')->default(null);
});
