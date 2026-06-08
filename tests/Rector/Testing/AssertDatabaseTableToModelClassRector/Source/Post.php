<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\Source;

use Illuminate\Database\Eloquent\Model;

// Custom $table that does NOT match the convention for `posts` → must be skipped.
final class Post extends Model
{
    protected $table = 'blog_posts';
}
