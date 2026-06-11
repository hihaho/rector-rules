<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\PostModel;

// Dot notation spans three models — each segment resolves against the model the
// previous relation points to.
function loadNestedPath(PostModel $post): void
{
    $post->loadMissing('comments.author.avatar');
}

?>
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\CommentModel;
use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\AuthorModel;
use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\PostModel;

// Dot notation spans three models — each segment resolves against the model the
// previous relation points to.
function loadNestedPath(PostModel $post): void
{
    $post->loadMissing(PostModel::COMMENTS . '.' . CommentModel::AUTHOR . '.' . AuthorModel::AVATAR);
}

?>
