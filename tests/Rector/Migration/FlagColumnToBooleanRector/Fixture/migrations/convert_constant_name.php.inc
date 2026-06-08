<?php

namespace migrations;

use Hihaho\RectorRules\Tests\Rector\Migration\FlagColumnToBooleanRector\Source\QuestionColumns;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('questions', function (Blueprint $table): void {
    $table->tinyInteger(QuestionColumns::ENABLE_ANSWER_IMAGE_ZOOM)->default(1);
});
-----
<?php

namespace migrations;

use Hihaho\RectorRules\Tests\Rector\Migration\FlagColumnToBooleanRector\Source\QuestionColumns;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('questions', function (Blueprint $table): void {
    $table->boolean(QuestionColumns::ENABLE_ANSWER_IMAGE_ZOOM)->default(true);
});
