<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\PostModel;

// Pure array nesting, three levels deep, with siblings at each level: every key
// and bare value resolves against the model its own level belongs to.
function loadDeepArray(PostModel $post): void
{
    $post->loadMissing([
        'comments' => [
            'author' => ['avatar'],
            'replies',
        ],
        'author',
    ]);
}

?>
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\CommentModel;
use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\AuthorModel;
use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\PostModel;

// Pure array nesting, three levels deep, with siblings at each level: every key
// and bare value resolves against the model its own level belongs to.
function loadDeepArray(PostModel $post): void
{
    $post->loadMissing([
        PostModel::COMMENTS => [
            CommentModel::AUTHOR => [AuthorModel::AVATAR],
            CommentModel::REPLIES,
        ],
        PostModel::AUTHOR,
    ]);
}

?>
