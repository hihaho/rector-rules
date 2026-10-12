# Imports

`HihahoSetList::IMPORTS`

| Rule | Effect |
|---|---|
| `AliasImportRector` | Renames imports using configured aliases |

`Illuminate\Database\Eloquent\Builder` and `Illuminate\Database\Query\Builder` share a
short name, so an unaliased `Builder` type hint does not say which one the method
expects. The rule has no aliases of its own; the `IMPORTS` set configures these three:

| Class | Alias |
|---|---|
| `Illuminate\Database\Eloquent\Builder` | `EloquentQueryBuilder` |
| `Illuminate\Database\Query\Builder` | `QueryBuilder` |
| `Illuminate\Database\Eloquent\Collection` | `EloquentCollection` |

```diff
-use Illuminate\Database\Eloquent\Builder;
+use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

-public function scopeActive(Builder $query): Builder
+public function scopeActive(EloquentQueryBuilder $query): EloquentQueryBuilder
```

Every reference in the file is updated:

- Flat `use` and grouped `use Foo\{A, B};` imports
- Type hints, `new` expressions, `extends`, `instanceof`
- PHPDoc tags (`@param`, `@return`, `@var`, `@method`, `@property`, `@mixin`) on
  classes, interfaces, traits, enums, methods, properties and functions

## Collision safety

If the target alias is already taken by another import in the same file, the rule leaves
that file alone rather than producing a PHP-fatal `use X as Y` collision. Rename the
conflicting import, or configure a different alias.

## Custom aliases

Configuring the rule replaces the whole map rather than adding to it, so repeat any of
the three you want to keep:

```php
use Hihaho\RectorRules\Rector\Import\AliasImportRector;

->withConfiguredRule(AliasImportRector::class, [
    'Illuminate\Database\Eloquent\Builder' => 'EloquentQueryBuilder',
    'Illuminate\Database\Query\Builder' => 'QueryBuilder',
    'Illuminate\Database\Eloquent\Collection' => 'EloquentCollection',
])
```
