# Hihaho Rector Rules

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hihaho/rector-rules.svg?style=flat-square)](https://packagist.org/packages/hihaho/rector-rules)
[![Tests](https://img.shields.io/github/actions/workflow/status/hihaho/rector-rules/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/hihaho/rector-rules/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/hihaho/rector-rules.svg?style=flat-square)](https://packagist.org/packages/hihaho/rector-rules)
[![License](https://img.shields.io/github/license/hihaho/rector-rules.svg?style=flat-square)](LICENSE)

[Rector](https://getrector.com/) rules that enforce the Laravel conventions from the [Hihaho Development Guidelines](https://guidelines.hihaho.com/): naming, routing, migration safety, and import aliasing.

For the static-analysis counterparts (rules that flag code but don't rewrite it), see [`hihaho/phpstan-rules`](https://github.com/hihaho/phpstan-rules).

## Requirements

- PHP `^8.3`
- Rector `^2.0`
- Laravel `^11`, `^12`, or `^13` (rules reference `Illuminate\…` classes)

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
    HihahoSetList::NAMING,
    HihahoSetList::ROUTING,
    HihahoSetList::MIGRATIONS,
    HihahoSetList::IMPORTS,
])
```

## Rule Sets

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
-    $table->boolean(Video::CALIPER_ENABLED)->nullable();
+    $table->string('description');
+    $table->boolean('caliper_enabled')->nullable();
 });
```

**Why?** Migrations must be self-contained. Using `->after()` can disable MySQL's INSTANT DDL optimization on large tables. Referencing model constants creates a dependency that breaks if the constant is later renamed or removed.

**Scope:**

- `RemoveAfterColumnPositioningRector` only strips `->after()` calls whose receiver is a `ColumnDefinition` (e.g. `$table->string('x')->after('y')`). Blueprint's two-arg scoping form (`$table->after($col, Closure)`) and unrelated `->after()` methods (e.g. `Collection::after`) are left alone.
- `InlineMigrationConstantsRector` skips enum cases so `Status::Active` keeps its enum semantics instead of silently becoming a string literal.

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
