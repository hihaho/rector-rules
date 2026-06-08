<?php

namespace migrations;

use Hihaho\RectorRules\Tests\Rector\Migration\FlagColumnToBooleanRector\Source\ArticleColumns;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('articles', function (Blueprint $table): void {
    $table->tinyInteger(ArticleColumns::IS_PUBLISHED)->default(1);
});
-----
<?php

namespace migrations;

use Hihaho\RectorRules\Tests\Rector\Migration\FlagColumnToBooleanRector\Source\ArticleColumns;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('articles', function (Blueprint $table): void {
    $table->boolean(ArticleColumns::IS_PUBLISHED)->default(true);
});
