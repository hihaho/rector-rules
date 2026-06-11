<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\PostModel;

// Array-form nesting: the keyed value lists child relations that belong to the
// model the key relation points to, not the root model.
function loadNestedArray(PostModel $post): void
{
    $post->load([
        'comments' => ['author', 'replies'],
        'author',
    ]);
}

?>
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\CommentModel;
use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\PostModel;

// Array-form nesting: the keyed value lists child relations that belong to the
// model the key relation points to, not the root model.
function loadNestedArray(PostModel $post): void
{
    $post->load([
        PostModel::COMMENTS => [CommentModel::AUTHOR, CommentModel::REPLIES],
        PostModel::AUTHOR,
    ]);
}

?>
