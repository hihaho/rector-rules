<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\PostModel;

// Mirrors the common call shape: some entries are already constants, one is a
// bare dot-notation string that must be split and resolved level by level.
function loadMixed(PostModel $post): void
{
    $post->loadMissing([
        PostModel::AUTHOR,
        'comments.author.avatar',
    ]);
}

?>
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\CommentModel;
use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\AuthorModel;
use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\PostModel;

// Mirrors the common call shape: some entries are already constants, one is a
// bare dot-notation string that must be split and resolved level by level.
function loadMixed(PostModel $post): void
{
    $post->loadMissing([
        PostModel::AUTHOR,
        PostModel::COMMENTS . '.' . CommentModel::AUTHOR . '.' . AuthorModel::AVATAR,
    ]);
}

?>
