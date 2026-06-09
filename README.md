# Hihaho Rector Rules

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hihaho/rector-rules.svg?style=flat-square)](https://packagist.org/packages/hihaho/rector-rules)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/hihaho/rector-rules/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/hihaho/rector-rules/actions/workflows/run-tests.yml)
[![GitHub PHPStan Action Status](https://img.shields.io/github/actions/workflow/status/sandermuller/stopwatch/phpstan.yml?branch=main&label=phpstan&style=flat-square)](https://github.com/sandermuller/stopwatch/actions?query=workflow%3Aphpstan+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/hihaho/rector-rules.svg?style=flat-square)](https://packagist.org/packages/hihaho/rector-rules)
[![License](https://img.shields.io/github/license/hihaho/rector-rules.svg?style=flat-square)](LICENSE)

[Rector](https://getrector.com/) rules that enforce the Laravel conventions from the [Hihaho Development Guidelines](https://guidelines.hihaho.com/): naming, routing, migration safety, and import aliasing.

For the static-analysis counterparts (rules that flag code but don't rewrite it), see [`hihaho/phpstan-rules`](https://github.com/hihaho/phpstan-rules).

## Requirements

- PHP `^8.3`
- Rector `^2.0`
- Laravel `^12` or `^13` (rules reference `Illuminate\…` classes)

## Installation

```bash
composer require hihaho/rector-rules --dev
```

## Usage

Add the desired rule sets to your `rector.php`:

```php
use Hihaho\RectorRules\Set\HihahoSetList;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withSets([
        HihahoSetList::ALL, // all rules
    ]);
```

Or pick individual sets:

```php
->withSets([
    HihahoSetList::CODE_QUALITY,
    HihahoSetList::ELOQUENT,
    HihahoSetList::NAMING,
    HihahoSetList::ROUTING,
    HihahoSetList::MIGRATIONS,
    HihahoSetList::IMPORTS,
])
```

## Rule Sets

### Code Quality (`HihahoSetList::CODE_QUALITY`)

General code-quality conventions.

| Rule                                    | Description                                                          |
|-----------------------------------------|----------------------------------------------------------------------|
| `RemoveUnnecessaryNullsafeOperatorRector` | Remove the nullsafe operator (`?->`) when the receiver can never be null |
| `NativeFunctionFlagArgumentToNamedRector` | Name the opaque trailing bool/null flag of well-known native functions |
| `FirstPartyFlagArgumentToNamedRector`     | Name the opaque trailing bool/null flag on a first-party method call |

#### `RemoveUnnecessaryNullsafeOperatorRector`

```diff
-return $this->resource->poster?->original;
+return $this->resource->poster->original;
```

**Why?** A `?->` on a value the type system guarantees is non-null is dead noise —
it reads as "this might be null" when it can't be. PHPStan already *reports* this at
`level: max` under bleeding-edge (`nullsafe.neverNull`, "Using nullsafe … on
non-nullable type"); this rule *fixes* it, so the two complement each other.

**Scope & safety:**

- Handles both `?->property` and `?->method()`, and converts only the segment whose
  immediate receiver is provably non-null — so in a chain like
  `$resource?->maybePoster?->original` only the load-bearing nullsafe survives.
- Nullability is read from the PHPStan `Scope` (`getNativeType`), which resolves a
  `?Foo` receiver to `Foo|null` and leaves it untouched. A receiver that is
  `mixed`/unknown, a union with a scalar, or possibly-null is always left alone —
  the rule only removes a `?->` it can prove is redundant.
- By default it ignores phpdoc-only non-nullability (e.g. an Eloquent `@property`),
  so a stale annotation can't cause a wrong removal. Pass
  `['trust_phpdoc_types' => true]` via `withConfiguredRule()` to also trust phpdoc.

#### `NativeFunctionFlagArgumentToNamedRector` & `FirstPartyFlagArgumentToNamedRector`

```diff
-$found = in_array($needle, $haystack, true);
+$found = in_array($needle, $haystack, strict: true);
```

```diff
-$token = $store->resolve($platform, false);
+$token = $store->resolve($platform, inherit: false);
```

**Why?** A bare `true`/`false`/`null` at a call site is opaque — the reader has to
open the callee to learn what the flag means. Naming the parameter makes the call
self-documenting. The two rules split by what owns the parameter name:

- `NativeFunctionFlagArgumentToNamedRector` works off a curated map of native
  functions (`in_array`/`array_search` → `strict`, `json_decode` → `associative`)
  whose flag names are frozen by PHP. Extend or override it via
  `['function_flag_arguments' => ['in_array' => [2 => 'strict']]]`.
- `FirstPartyFlagArgumentToNamedRector` resolves the parameter name by reflection,
  and fires only for callees in your own namespaces — never vendor signatures,
  whose parameter names can change under semver. Defaults to `['App\\']`; configure
  with `['first_party_namespaces' => ['App\\', 'Domain\\']]`.

**Scope & safety:**

- Only a bare `true`, `false`, or `null` literal is named — a variable, constant,
  or enum case is already self-documenting and is left alone.
- Only the **last** argument of a call is ever named, which keeps the result valid
  (a positional argument after a named one is a PHP fatal). So `json_decode($j, true)`
  converts but `json_decode($j, true, 512)` is left as-is.
- An already-named argument, an unpacked argument (`...$args`), a variadic target
  parameter, and a callee that can't be resolved (dynamic name, closure, `__call`)
  are all skipped.

### Eloquent (`HihahoSetList::ELOQUENT`)

Enforces conventions for Eloquent relation usage.

| Rule                                  | Description                                                                                    |
|---------------------------------------|------------------------------------------------------------------------------------------------|
| `CollectedByAttributeRector`          | Replace `newCollection()` override with the `#[CollectedBy]` attribute (Laravel 11+)          |
| `NestedArrayEagerLoadingRector`       | Convert dot-notation eager loading to nested-array form when multiple relations share a parent |
| `ObservedByAttributeRector`           | Replace `booted()` observer registration with the `#[ObservedBy]` attribute (Laravel 11+)     |
| `RelationNameToClassConstantRector`   | Replace string relation names with the existing class constant of the model                    |

```diff
-use App\Collections\ArticleCollection;
+use App\Collections\ArticleCollection;
+use Illuminate\Database\Eloquent\Attributes\CollectedBy;
 use Illuminate\Database\Eloquent\Model;

+#[CollectedBy(ArticleCollection::class)]
 class Article extends Model
 {
-    public function newCollection(array $models = []): ArticleCollection
-    {
-        return new ArticleCollection($models);
-    }
 }
```

```diff
-use App\Observers\ArticleObserver;
+use App\Observers\ArticleObserver;
+use Illuminate\Database\Eloquent\Attributes\ObservedBy;
 use Illuminate\Database\Eloquent\Model;

+#[ObservedBy(ArticleObserver::class)]
 class Article extends Model
 {
-    protected static function booted(): void
-    {
-        static::observe(ArticleObserver::class);
-    }
 }
```

```diff
 $query->with([
-    Article::COMMENTS . '.' . Comment::AUTHOR,
-    Article::COMMENTS . '.' . Comment::TAGS,
+    Article::COMMENTS => [
+        Comment::AUTHOR,
+        Comment::TAGS,
+    ],
     Article::AUTHOR,
 ]);
```

```diff
-$article->loadMissing('relatedArticles');
+$article->loadMissing(Article::RELATED_ARTICLES);
```

**Why?** Nested-array form states the shared parent once instead of repeating it per relation, so adding or removing a child relation is a one-line diff. Class constants make relation usages findable with "find usages" and rename-safe, where string literals silently break when a relation is renamed.

**Scope:**

- `CollectedByAttributeRector` fires when `newCollection()` has exactly one statement — `return new SomeCollection($models)` — the return type matches the constructed class, and the class extends `Illuminate\Database\Eloquent\Model` directly or indirectly. The method is removed entirely; `#[CollectedBy(SomeCollection::class)]` is prepended to the class. Methods with additional logic (filtering, merging) are left untouched. The rule is idempotent: it skips if `#[CollectedBy]` is already present.
- `NestedArrayEagerLoadingRector` applies to `with`, `load`, `loadMissing`, and `loadCount`. It only groups when two or more entries share the same parent prefix — a single dot-notation chain without siblings stays as-is. Grouping is applied recursively, so deeper shared prefixes nest further.
- `ObservedByAttributeRector` fires when `booted()` has exactly one statement — `static::observe(SomeObserver::class)` or `self::observe(...)` — and the class extends `Illuminate\Database\Eloquent\Model` directly or indirectly. The method is removed entirely; `#[ObservedBy(SomeObserver::class)]` is prepended to the class. The rule is idempotent: it skips if `#[ObservedBy]` is already present. The observer argument must be a `::class` constant fetch — string literals are not converted.
- `RelationNameToClassConstantRector` additionally covers `relationLoaded`, `getRelation`, `setRelation`, and `unsetRelation`, on both instance calls (`$model->load(...)`) and static calls (`Model::with(...)`, `self::with(...)`). It only fires when the receiver resolves to a single concrete class **and** that class has a *public* constant whose value equals the string — it never invents constants and never references a non-public one (which would be a fatal access error). Inside the model it emits `self::`/`static::`; elsewhere the class name. Only the relation-name argument is touched — eager-load constraint callbacks are left alone. When multiple constants share the value, only a constant named like the SCREAMING_SNAKE_CASE form of the relation is trusted; otherwise the string is left alone. Dot-notation strings (`'parent.child'`) span multiple models and are not converted.

### Naming (`HihahoSetList::NAMING`)

Enforces class naming suffixes based on the parent class.

| Rule                          | Description                                                                                                  |
|-------------------------------|--------------------------------------------------------------------------------------------------------------|
| `AddCommandSuffixRector`      | Classes extending `Command` must end with `Command`                                                          |
| `AddMailSuffixRector`         | Classes extending `Mailable` must end with `Mail`                                                            |
| `AddNotificationSuffixRector` | Classes extending `Notification` must end with `Notification`                                                |
| `AddResourceSuffixRector`     | `JsonResource` subclasses end with `Resource`; `ResourceCollection` subclasses end with `ResourceCollection` |

```diff
-class NotifyUsers extends Command
+class NotifyUsersCommand extends Command
```

**Why?** Suffixes make artifact types obvious from the class name alone, and they prevent collisions like `App\Mail\Welcome` vs `App\Notifications\Welcome` from biting you later. IDE search and `grep` are a lot more useful when the convention holds.

**Skipped:** abstract classes, classes already suffixed correctly, and (in the Resource rule only) `JsonResource` subclasses whose names already end in `Collection`. Those look like naming mistakes; renaming them to `FooCollectionResource` would just bury the bug.

### Routing (`HihahoSetList::ROUTING`)

Enforces consistent route definitions. Only applies to files under a `routes/` directory (and skips anything under `/vendor/`).

| Rule                             | Description                                                          |
|----------------------------------|----------------------------------------------------------------------|
| `NormalizeRoutePathRector`       | Strip leading/trailing slashes and collapse consecutive slashes      |
| `RouteGroupArrayToMethodsRector` | Convert array-based route groups to fluent method chaining           |

```diff
-Route::get('/about', fn () => 'about');
+Route::get('about', fn () => 'about');
```

```diff
-Route::group(['middleware' => 'web', 'prefix' => 'admin', 'name' => 'admin.'], function (): void {
+Route::middleware('web')->prefix('admin')->name('admin.')->group(function (): void {
     Route::get('dashboard', fn () => 'dashboard');
 });
```

**Why?** Fluent chains produce cleaner diffs than option arrays, and they're easier to extend when you tack on another middleware or prefix. Path normalization prevents duplicate routes from `/foo` vs `foo/`.

**Scope:**

- `NormalizeRoutePathRector` only rewrites `Route::get|post|put|patch|delete|any|head`. `Route::match`, `Route::redirect`, `Route::view`, and custom verbs are left untouched.
- `RouteGroupArrayToMethodsRector` only rewrites groups where every array key is in the supported set: `middleware`, `prefix`, `name` / `as`, `namespace`, `domain`, `where`, `excluded_middleware`, `scope_bindings`. Unknown keys, positional (no-key) arrays, and empty arrays are left as-is to avoid dropping configuration silently.

### Migrations (`HihahoSetList::MIGRATIONS`)

Enforces self-contained, production-safe migrations. Only applies to files in the `database/migrations/` directory.

| Rule                                 | Description                                                                          |
|--------------------------------------|--------------------------------------------------------------------------------------|
| `RemoveAfterColumnPositioningRector` | Remove `->after()` column positioning calls (prevents disabling INSTANT DDL)         |
| `InlineMigrationConstantsRector`     | Inline class constants (string, int, float, bool, null). Enum cases are left alone.  |

```diff
 Schema::table('users', function (Blueprint $table): void {
-    $table->string('description')->after('name');
-    $table->boolean(Article::COMMENTS_ENABLED)->nullable();
+    $table->string('description');
+    $table->boolean('comments_enabled')->nullable();
 });
```

**Why?** Migrations must be self-contained. Using `->after()` can disable MySQL's INSTANT DDL optimization on large tables. Referencing model constants creates a dependency that breaks if the constant is later renamed or removed.

**Scope:**

- `RemoveAfterColumnPositioningRector` only strips `->after()` calls whose receiver is a `ColumnDefinition` (e.g. `$table->string('x')->after('y')`). Blueprint's two-arg scoping form (`$table->after($col, Closure)`) and unrelated `->after()` methods (e.g. `Collection::after`) are left alone.
- `InlineMigrationConstantsRector` skips enum cases so `Status::Active` keeps its enum semantics instead of silently becoming a string literal.

#### Opt-in: `FlagColumnToBooleanRector` (not in any set)

Converts flag-style integer columns to `boolean` in migrations:

```diff
-$table->tinyInteger('is_published')->default(1);
+$table->boolean('is_published')->default(true);
```

This rule is **deliberately not in the `MIGRATIONS` set** and is a **no-op until you
opt in**, because it is only safe under **MySQL/MariaDB** (where `tinyInteger` is
`tinyint` and `boolean` is `tinyint(1)` — identical storage). On PostgreSQL it would
be an incompatible `smallint`→`boolean` change. Register it explicitly as a one-time
normalisation:

```php
->withConfiguredRule(FlagColumnToBooleanRector::class, [
    FlagColumnToBooleanRector::CONFIRM_MYSQL_COMPATIBLE => true,
])
```

**Caveat — historical migrations.** Editing an already-run migration does not change
production (it won't re-run); it only changes freshly-built databases, so prod stays
`tinyint` while a fresh DB gets `tinyint(1)`. On MySQL this is cosmetic (display
width), but treat the run as a deliberate one-time normalisation, not a routine pass.

**Scope:** only signed `tinyInteger` columns whose name matches a flag pattern
(`is_`/`has_`/`should_`/`enable_`/… prefixes, `_enabled`/`_disabled`/`_required`
suffixes — configurable via `name_prefixes`/`name_suffixes`) **and** that carry an
explicit `->default(0|1|true|false)`. `unsignedTinyInteger` is intentionally **out of
scope** — its 0-255 range would be lost if a misclassified flag-named column were
narrowed to a signed `tinyint(1)` (signed `tinyInteger`→`boolean` is storage-identical,
so it has no such risk). Defaultless, auto-increment, `->change()`, wider-type, and
non-flag columns are left untouched. The name + default heuristic still isn't proof a
column is boolean (e.g. `has_count`), so review the diff.

### Imports (`HihahoSetList::IMPORTS`)

Configurable import aliasing to prevent ambiguous class names.

| Rule                | Description                             |
|---------------------|-----------------------------------------|
| `AliasImportRector` | Rename imports using configured aliases |

Default configuration:
- `Illuminate\Database\Eloquent\Builder` → `EloquentQueryBuilder`
- `Illuminate\Database\Query\Builder` → `QueryBuilder`
- `Illuminate\Database\Eloquent\Collection` → `EloquentCollection`

```diff
-use Illuminate\Database\Eloquent\Builder;
+use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

-public function scopeActive(Builder $query): Builder
+public function scopeActive(EloquentQueryBuilder $query): EloquentQueryBuilder
```

All references in the file are updated, including:

- Flat `use` and grouped `use Foo\{A, B};` imports
- Type hints, `new` expressions, `extends`, `instanceof`
- PHPDoc tags (`@param`, `@return`, `@var`, `@method`, `@property`, `@mixin`) on classes, interfaces, traits, enums, methods, properties, and functions

**Why?** `Illuminate\Database\Eloquent\Builder` and `Illuminate\Database\Query\Builder` share a short name, so an unaliased `Builder` type hint tells you nothing about which one the method expects. Consistent aliases show which `Builder` is in play without having to look at the `use` block, and they free up the short name if the app wants its own.

**Collision safety:** if the target alias is already used by another import in the same file (e.g. the file already has a `use App\Queries\EloquentQueryBuilder;`), the rule leaves that file alone rather than producing a PHP-fatal `use X as Y` collision. Rename the conflicting import or configure a different alias to proceed.

#### Custom alias configuration

Override the default aliases in your `rector.php`:

```php
use Hihaho\RectorRules\Rector\Import\AliasImportRector;

->withConfiguredRule(AliasImportRector::class, [
    'Illuminate\Database\Eloquent\Builder' => 'EloquentQueryBuilder',
    'Illuminate\Database\Query\Builder' => 'QueryBuilder',
    'Illuminate\Database\Eloquent\Collection' => 'EloquentCollection',
])
```

### Testing (`HihahoSetList::TESTING`)

Replaces magic table-name strings in database assertions with the model class, and converts verbose single-id existence checks to their expressive equivalents.

| Rule                                    | Description                                                                       |
|-----------------------------------------|-----------------------------------------------------------------------------------|
| `AssertDatabaseTableToModelClassRector` | Replace a database-assertion table string with the matching Eloquent model class  |
| `AssertModelExistsRector`               | Replace `assertDatabaseHas/Missing` single-`id` checks with `assertModelExists/Missing` |

#### `AssertDatabaseTableToModelClassRector`

```diff
-$this->assertDatabaseHas('users', ['email' => $email]);
+$this->assertDatabaseHas(User::class, ['email' => $email]);
```

**Why?** A model class is rename-safe and navigable with "find usages", where a table string silently rots when the table is renamed. Laravel resolves the table from the model, so the assertion's behaviour is unchanged.

**Scope:**

- Applies to `assertDatabaseHas`, `assertDatabaseMissing`, and `assertDatabaseCount`, called as `$this->…` or `self::…`/`static::…` inside a PHPUnit `TestCase` subclass. (`assertSoftDeleted`/`assertNotSoftDeleted` are intentionally excluded — with a model they also resolve the deleted-at column, so a table match alone doesn't prove behaviour is preserved.)
- **Verify-or-skip:** the string is rewritten only when the resolved model's own table *provably* equals it. A model with a mismatched `$table`, an overridden `getTable()`, or no resolvable model at all is left untouched — a missed conversion is acceptable, a wrong one is not.
- Configurable: `model_namespace` (default `App\Models`) and a `table_to_model` map for tables the singularise-and-studly convention can't resolve. A map entry is still verified, never trusted blindly.

#### `AssertModelExistsRector`

```diff
-$this->assertDatabaseHas(Article::class, ['id' => $article->id]);
-$this->assertDatabaseMissing(Article::class, ['id' => $article->id]);
+$this->assertModelExists($article);
+$this->assertModelMissing($article);
```

**Why?** `assertModelExists($model)` is the idiomatic Laravel assertion for checking a model still exists in the database. The `assertDatabaseHas(Model::class, ['id' => $model->id])` form is more verbose and repeats information already carried by the model instance.

**Scope:**

- Fires when arg 1 is `SomeModel::class`, arg 2 is a single-item `['id' => $var->id]` array, and PHPStan can confirm `$var` is typed as `SomeModel`.
- Also accepts class-constant keys (`SomeModel::ID`) when the constant resolves to the string `'id'`.
- Skips calls with three arguments (the third is a connection name — dropping it would silently switch connections).
- Skips multi-key arrays (those assert attribute values, not just existence).
- Only fires inside a `PHPUnit\Framework\TestCase` subclass called on `$this` or `self::`/`static::` — non-test helpers with a same-named method are left alone.

## Covered by upstream Rector

Some rules in [`hihaho/phpstan-rules`](https://github.com/hihaho/phpstan-rules) have no counterpart here because the fix already ships in an upstream Rector set. Enable the upstream set instead of waiting for a rule in this package.

| PHPStan rule                   | Upstream set                                           | Notes                                                                          |
|--------------------------------|--------------------------------------------------------|--------------------------------------------------------------------------------|
| `onlyAllowFacadeAliasInBlade`  | `LaravelSetList::LARAVEL_FACADE_ALIASES_TO_FULL_NAMES` | Rewrites `use Route;` to `use Illuminate\Support\Facades\Route;` (and siblings) |

```php
use RectorLaravel\Set\LaravelSetList;

->withSets([LaravelSetList::LARAVEL_FACADE_ALIASES_TO_FULL_NAMES])
```

## Testing

```bash
composer test
```

Runs the full Pest suite. For the same quality gate the CI runs (Pint + Rector + PHPStan + tests), use `composer qa`.

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for recent changes.

## Contributing

Pull requests and issues are welcome. See [CONTRIBUTING.md](CONTRIBUTING.md) for the local setup, fixture format, and what CI will check.

## Security

Please report security issues privately. See [SECURITY.md](SECURITY.md) for how.

## Credits

- [Hihaho](https://github.com/hihaho)
- [All contributors](https://github.com/hihaho/rector-rules/contributors)

## License

MIT. See [LICENSE](LICENSE).
