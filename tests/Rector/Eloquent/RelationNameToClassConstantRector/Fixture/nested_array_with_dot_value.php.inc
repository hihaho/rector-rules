<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\PostModel;

// Array nesting whose leaf is itself a dot path: the value resolves against the
// model the key relation points to, then the dot path hops further from there.
function loadArrayThenDot(PostModel $post): void
{
    $post->loadMissing([
        'comments' => ['author.avatar'],
    ]);
}

?>
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\CommentModel;
use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\AuthorModel;
use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\PostModel;

// Array nesting whose leaf is itself a dot path: the value resolves against the
// model the key relation points to, then the dot path hops further from there.
function loadArrayThenDot(PostModel $post): void
{
    $post->loadMissing([
        PostModel::COMMENTS => [CommentModel::AUTHOR . '.' . AuthorModel::AVATAR],
    ]);
}

?>
