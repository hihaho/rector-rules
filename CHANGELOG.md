# Changelog

All notable changes to `hihaho/rector-rules` will be documented in this file.

## 0.1.2 - 2026-04-12

### Fixed

`AliasImportRector` no longer produces duplicate `use X as Alias;` lines when a file contains both the unaliased and aliased form of the same class. In 0.1.1 a file like:

```php
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

```
would have the first line rewritten too, resulting in two identical aliased imports and a PHP fatal at boot. Now it leaves the duplicate `use` alone while still renaming body references to the alias — the unaliased import becomes dead code that Pint's `no_unused_imports` can prune.

### Changed

Minimum versions raised:

- `rector/rector` from `^2.0` to `^2.4.1` — the scanner uses `Rector\PhpParser\Node\FileNode` and `AbstractRector::getFile()`, both added in 2.4.1.
- `phpstan/phpstan` from `^2.0` to `^2.1` — the naming rules use `ClassReflection::isSubclassOfClass()`, which replaces the deprecated string-arg variant and was added in 2.1.

If your project pins lower minors of either, bump before upgrading.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.1.0...0.1.2

## 0.1.1 - 2026-04-12

### 0.1.1

#### Fixed

`AddResourceSuffixRector` no longer appends `Resource` to `JsonResource` subclasses that already end in a deliberate role suffix (`Transformer`, `Presenter`, `Formatter`, `Serializer`, `Mapper`, `Normalizer`). In 0.1.0 a class like `SubtitleTransformer` would become `SubtitleTransformerResource`; it's now left alone. Caught by [@SanderMuller](https://github.com/SanderMuller) running a dry-run against the Hihaho main repo after 0.1.0 shipped.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.1.0...0.1.1

## 0.1.0 - 2026-04-12

Initial public release of `hihaho/rector-rules`.

Rector rules that automate the Laravel conventions from the [Hihaho Development Guidelines](https://guidelines.hihaho.com/): naming suffixes, routing style, migration safety, and import aliasing. Pairs with [hihaho/phpstan-rules](https://github.com/hihaho/phpstan-rules) for the static-analysis side of the same conventions.

### Requirements

- PHP `^8.3`
- Rector `^2.0`
- Laravel `^11`, `^12`, or `^13`

### Rule sets

#### `HihahoSetList::NAMING`

Suffix enforcement for classes extending Laravel base types. Skips abstract classes and already-suffixed names.

- `AddCommandSuffixRector` — `extends Command` → ends with `Command`
- `AddMailSuffixRector` — `extends Mailable` → ends with `Mail`
- `AddNotificationSuffixRector` — `extends Notification` → ends with `Notification`
- `AddResourceSuffixRector` — `JsonResource` subclasses end with `Resource`; `ResourceCollection` subclasses end with `ResourceCollection`. Won't rewrite `JsonResource` subclasses already named `*Collection` (likely naming mistakes).

#### `HihahoSetList::ROUTING`

Scoped to files under a `routes/` directory (excludes `/vendor/`).

- `NormalizeRoutePathRector` — strips leading/trailing slashes and collapses consecutive slashes. Handles `get`, `post`, `put`, `patch`, `delete`, `any`, `head`. Leaves `match`, `redirect`, `view`, and custom verbs alone.
- `RouteGroupArrayToMethodsRector` — array-based route groups to fluent chains. Supported keys: `middleware`, `prefix`, `name`/`as`, `namespace`, `domain`, `where`, `excluded_middleware`, `scope_bindings` (the `false` case becomes `->withoutScopedBindings()`). Groups with unknown keys, positional items, or empty arrays are left unchanged to avoid silently dropping config.

#### `HihahoSetList::MIGRATIONS`

Scoped to `database/migrations/` (excludes `/vendor/`).

- `RemoveAfterColumnPositioningRector` — strips `->after()` from the Blueprint column-positioning chain, which can disable MySQL's INSTANT DDL on large tables. Narrowed to `ColumnDefinition` receivers only; leaves Blueprint's two-arg scoping form (`$table->after($col, Closure)`) and unrelated `->after()` methods alone.
- `InlineMigrationConstantsRector` — replaces class constants with their literal values (string, int, float, bool, null) so migrations stay self-contained. Enum cases are left alone.

#### `HihahoSetList::IMPORTS`

Configurable import aliasing.

- `AliasImportRector` — renames imports per a configured `FQCN => alias` map, then updates every reference in the file (flat and grouped `use`, type hints, `new`, `extends`, `instanceof`, and PHPDoc tags `@param`/`@return`/`@var`/`@method`/`@property`/`@mixin` on classes, interfaces, traits, enums, methods, properties, and functions). Includes a collision guard: if the target alias is already used by another import in the same file, the file is left unchanged.
  
  Default aliases:
  
  - `Illuminate\Database\Eloquent\Builder` → `EloquentQueryBuilder`
  - `Illuminate\Database\Query\Builder` → `QueryBuilder`
  - `Illuminate\Database\Eloquent\Collection` → `EloquentCollection`
  

### Usage

```bash
composer require hihaho/rector-rules --dev



```
```php
use Hihaho\RectorRules\Set\HihahoSetList;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withSets([HihahoSetList::ALL]);



```
Pick individual sets for narrower scope. See the [README](../../README.md) for per-set behaviour, including what each rule deliberately skips.

### Notes on the `0.x` line

This is a `0.x` release. Rule identifiers, alias defaults, and skip policies may change between minor versions as real-world usage surfaces edge cases. Pin to `^0.1` in `composer.json` if you want patches but not minors.

**Full Changelog**: https://github.com/hihaho/rector-rules/commits/0.1.0

## Unreleased
