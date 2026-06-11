<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source\PostModel;

// 'comments' and 'subject' both have matching constants, but 'subject' is a
// polymorphic morphTo relation with no single related model — so the hop to the
// next segment ('author') cannot be resolved and the whole path is left as-is.
function loadThroughMorph(PostModel $post): void
{
    $post->loadMissing('comments.subject.author');
}
