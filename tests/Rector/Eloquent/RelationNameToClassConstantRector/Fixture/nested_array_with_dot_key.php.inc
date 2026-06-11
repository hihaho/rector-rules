<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\PostModel;

// Both nesting forms combined: a dotted key whose value is a further nested
// array. Each key segment hops a model, and the value resolves against the model
// the key path ends on.
function loadCombined(PostModel $post): void
{
    $post->loadMissing([
        'comments.author' => ['avatar'],
    ]);
}

?>
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\CommentModel;
use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\AuthorModel;
use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\PostModel;

// Both nesting forms combined: a dotted key whose value is a further nested
// array. Each key segment hops a model, and the value resolves against the model
// the key path ends on.
function loadCombined(PostModel $post): void
{
    $post->loadMissing([
        PostModel::COMMENTS . '.' . CommentModel::AUTHOR => [AuthorModel::AVATAR],
    ]);
}

?>
