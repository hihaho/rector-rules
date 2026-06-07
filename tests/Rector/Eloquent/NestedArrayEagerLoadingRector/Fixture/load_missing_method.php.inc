<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class Playlist
{
    public const string CHILDREN = 'children';
    public const string PARENT = 'parent';
}

$model->loadMissing([
    Playlist::CHILDREN . '.' . Playlist::PARENT,
    Playlist::CHILDREN . '.' . Playlist::CHILDREN,
    Playlist::PARENT,
]);

?>
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

class Playlist
{
    public const string CHILDREN = 'children';
    public const string PARENT = 'parent';
}

$model->loadMissing([
    Playlist::CHILDREN => [Playlist::PARENT, Playlist::CHILDREN],
    Playlist::PARENT,
]);

?>
