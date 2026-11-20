<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final class Post extends Model
{
    // A concrete method on an abstract class is named.
    public function replies(): HasMany
    {
        return $this->hasMany(Post::class, 'parent_id', 'id');
    }
}

function run(array $settings, string $body, string $driver): string
{
    Arr::set($settings, 'mail.driver', $driver);

    return Str::limit($body, 100, end: '...');
}

?>
-----
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final class Post extends Model
{
    // A concrete method on an abstract class is named.
    public function replies(): HasMany
    {
        return $this->hasMany(related: Post::class, foreignKey: 'parent_id', localKey: 'id');
    }
}

function run(array $settings, string $body, string $driver): string
{
    Arr::set(array: $settings, key: 'mail.driver', value: $driver);

    return Str::limit(value: $body, limit: 100, end: '...');
}

?>
