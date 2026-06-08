# Changelog

All notable changes to `hihaho/rector-rules` will be documented in this file.

## 0.2.1 - 2026-06-08

<!-- verified-sha: 592b7bbfb26d4e645ac0c06672f99bad5cd8288e -->
A performance pass over the whole rule set and an output-formatting refinement for the nested eager-loading rule. No new rules, no configuration changes, and no change to which code the rules rewrite.

### Changed

- **`NestedArrayEagerLoadingRector`** now prints a grouped array across multiple lines — one item per line with a trailing comma — once it holds more than one item, instead of collapsing the result onto a single line. Single-item arrays stay inline, and any pre-existing array the rule does not rewrite keeps its original formatting. This matches the shape already shown in the rule's documentation and `CodeSample`.

### Performance

- The per-node work every rule does on each visited node was reduced substantially, with no change in behaviour. The hottest gates now match node types and method names directly instead of routing through the generic name resolver, the cheapest and most-selective checks run before file-path and reflection checks, the routing context resolves a class name once instead of twice, and the database-assertion rule memoizes its per-class test-context check. Across a representative corpus this cut per-node rule execution time by roughly 70%.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.2.0...0.2.1

## 0.2.0 - 2026-06-08

<!-- verified-sha: 60cb1deb008175323a6903ea2e2336b3e254b84c -->
Five new Rector rules across three sets, a cross-platform fix for the migration and routing rules, and a tightened supported-Laravel range.

### Added

- **`RemoveUnnecessaryNullsafeOperatorRector`** (new `CodeQuality` set) — removes a `?->` operator when the receiver can never be null. Defaults to native/certain types only; the `trust_phpdoc_types` option (strict boolean opt-in) additionally trusts phpdoc-derived non-nullability such as Eloquent `@property` annotations.
- **`NestedArrayEagerLoadingRector`** (`Eloquent` set) — converts dot-notation eager loading to the nested-array form when two or more relations share a parent, for `with`/`load`/`loadMissing`/`loadCount`. Only rewrites calls on an Eloquent `Builder`/`Model`/`Relation`/`Collection` receiver.
- **`RelationNameToClassConstantRector`** (`Eloquent` set) — replaces a string relation name with the model's existing class constant of the same value, making relation usages rename-safe and navigable.
- **`FlagColumnToBooleanRector`** (`Migration` set) — converts flag-style `tinyInteger` columns (names like `is_*`, `has_*`, `enable_*`, `*_enabled`) with a `0`/`1`/`true`/`false` default to `boolean`. Opt-in and MySQL/MariaDB-only via `confirm_mysql_compatible`; a no-op until enabled.
- **`AssertDatabaseTableToModelClassRector`** (new `Testing` set) — rewrites a database-assertion table string to the matching Eloquent model class for `assertDatabaseHas`/`assertDatabaseMissing`/`assertDatabaseCount`. Strict verify-or-skip: only converts when the model's table, connection, and construction are provably equivalent, so a missed conversion is preferred over a wrong one. Configurable `model_namespace` (default `App\Models`) and a `table_to_model` override map.

### Fixed

- The migration and routing rules now fire on Windows. Their context gates matched the file path against `/migrations/` and `/routes/` using forward slashes only, so on Windows backslash paths the gates never matched and the rules silently did nothing.

### Changed

- Dropped Laravel 11 from the supported range — this package now requires Laravel `^12` or `^13`. The rules transform `Illuminate\…` class names that are stable across those versions; the change reflects the test matrix (PHPUnit 12 / Pest 4 / Testbench 10+), which no longer exercises a Laravel 11 lane.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.1.4...0.2.0

## 0.1.4 - 2026-04-12

### Fixed

`AliasImportRector` now removes duplicate imports of the same FQCN rather than leaving the unaliased one as dead code. A file like:

```php
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;



```
becomes:

```php
use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;



```
In 0.1.3 the rule skipped rewriting the unaliased line and relied on Pint's `no_unused_imports` to clean it up. That falls apart when the same file references a different-FQCN type with the same short name (e.g. `\Illuminate\Contracts\Database\Eloquent\Builder` on a closure parameter) — Pint's `fully_qualified_strict_types` adds its own `use …\Builder;` while the old one is still sitting there, producing a PHP-fatal `Cannot use X as Y because the name is already in use`.

The fix removes the redundant `UseItem` during the rewrite, so the dead import never reaches Pint. Body references of the removed short name are still renamed to the alias (nothing dangles).

Covers three shapes:

- An unaliased import alongside the correctly-aliased one.
- A wrongly-aliased import alongside the correctly-aliased one.
- A grouped `use X\{Builder, Collection};` where only `Builder` is duplicated elsewhere — the `Builder` item gets removed from the group, `Collection` survives.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.1.3...0.1.4

## 0.1.3 - 2026-04-12

### Fixed

`AliasImportRector` now rewrites inline `/** @var Foo $x */` docblocks attached to statement nodes (assignments, `foreach`, `return`, etc.) in addition to the class-level and method-level docblocks it already handled. Previously the alias was applied to the `use` import and code references but the inline docblock kept the unaliased short name, leaving an undefined symbol that IDE and PHPStan would flag after the rewrite.

Statement nodes covered: `Expression`, `Foreach_`, `If_`, `While_`, `For_`, `Do_`, `Switch_`, `Return_`, `Echo_`. If you hit an inline docblock that still slips through after upgrading, open an issue with the node type and I'll widen the list.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.1.2...0.1.3

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
