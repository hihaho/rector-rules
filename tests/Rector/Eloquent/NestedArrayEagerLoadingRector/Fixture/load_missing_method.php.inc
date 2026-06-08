<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Model;

class Category
{
    public const string CHILDREN = 'children';
    public const string PARENT = 'parent';
}

function eager(Model $model): void
{
    $model->loadMissing([
        Category::CHILDREN . '.' . Category::PARENT,
        Category::CHILDREN . '.' . Category::CHILDREN,
        Category::PARENT,
    ]);
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

use Illuminate\Database\Eloquent\Model;

class Category
{
    public const string CHILDREN = 'children';
    public const string PARENT = 'parent';
}

function eager(Model $model): void
{
    $model->loadMissing([
        Category::CHILDREN => [Category::PARENT, Category::CHILDREN],
        Category::PARENT,
    ]);
}
