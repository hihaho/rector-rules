<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

final class UserService
{
    public function getUsers(): Collection
    {
        return new Collection();
    }
}

-----
<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;

final class UserService
{
    public function getUsers(): EloquentCollection
    {
        return new EloquentCollection();
    }
}
