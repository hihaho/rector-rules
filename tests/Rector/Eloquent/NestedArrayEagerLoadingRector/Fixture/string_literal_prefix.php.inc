<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

$query->with([
    'container' . '.' . 'users',
    'container' . '.' . 'ancestors',
    'tags',
]);
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\Fixture;

$query->with([
    'container' => ['users', 'ancestors'],
    'tags',
]);
