<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\Source;

use Illuminate\Database\Eloquent\Model;

final class Article extends Model
{
    public const string ID = 'id';

    public const string ARTICLE_KEY = 'article_id';
}
