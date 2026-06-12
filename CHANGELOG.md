# Changelog

All notable changes to `hihaho/rector-rules` will be documented in this file.

## 0.5.0 - 2026-06-12

<!-- verified-sha: bbeb4ebe6a862c9e285bb68f892dbca543ae2d39 -->
`RelationNameToClassConstantRector` now reaches nested relations. Previously it
only matched a single-level relation string against the receiver model's own
constants; nested paths were left untouched because no single constant spans
more than one model. It now resolves each level against the model the previous
relation points to.

### Changed

- **`RelationNameToClassConstantRector`** converts **nested relations level by
  level**, in both notations:
  
  - dot-notation strings — `'comments.author'` →
    `Post::COMMENTS . '.' . Comment::AUTHOR`
  - nested arrays — `['comments' => ['author']]` →
    `[Post::COMMENTS => [Comment::AUTHOR]]`
  
  The two forms compose, so a dotted key with a nested-array value or an array
  whose leaf is itself a dot path are both handled. Each hop to the next model
  is resolved without Larastan by reading the relation method's body for its
  Eloquent relationship factory call (`$this->belongsTo(Comment::class)`,
  `hasMany`, `hasOne`, …) and taking the first `::class` argument; resolution is
  memoised per `owner::relation`. Conversion is **all-or-nothing per path** — if
  any segment's model or constant can't be resolved (including a polymorphic
  `morphTo`, which has no single related model), the whole string is left as-is
  rather than half-converted. Single-level behaviour, the receiver-type and
  public-constant gates, and the SCREAMING_SNAKE_CASE tie-breaker are unchanged.
  

### Internal

- Added fixtures covering three-level dot paths, pure three-level nested arrays,
  the combined dot-key/array-value and array-key/dot-value shapes, the mixed
  constants-and-dotted-string call shape, and the `morphTo`/unresolvable-hop
  skips. Nested-relation test doubles carry real relation method bodies so the
  related-model hop is exercised end to end.
- Dropped the `roave/security-advisories` dev dependency.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.4.2...0.5.0

## 0.4.2 - 2026-06-09

<!-- verified-sha: d68af21fa6651ab6d485cde805dc23f020eb6d20 -->
### Changed

- **`CollectedByAttributeRector`** now converts non-`final` models on **Laravel
  13+**. 0.4.1 restricted the rewrite to `final` classes because, on Laravel 12,
  `#[CollectedBy]` is resolved from the model's own class only — a subclass would
  not inherit the attribute the way it inherited the `newCollection()` method.
  Laravel 13 resolves the attribute up the parent chain, so a subclass inherits
  it and the rewrite is behaviour-preserving for non-final models too. The rule
  detects the installed framework version and keeps the `final`-only gate on
  Laravel 12; the trait-/ancestor-supplied `newCollection()` skips are unchanged.

### Internal

- Expanded fixture coverage for the flag-argument namers (case-insensitive method
  and function names, fully-qualified native calls) and for `CollectedBy`
  preserving unrelated methods.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.4.1...0.4.2

## 0.4.1 - 2026-06-09

<!-- verified-sha: 88b8f85705df0500a9452ec4921948b7c1af0de3 -->
Correctness fixes for three rules introduced in 0.3.0/0.4.0, surfaced by
real-world adoption running the set against a production codebase: a hard crash
in the flag-argument namers and a silent collection-resolution change in
`CollectedByAttributeRector`.

### Fixed

- **`FirstPartyFlagArgumentToNamedRector`** and
  **`NativeFunctionFlagArgumentToNamedRector`** no longer abort the Rector run on
  a first-class callable. A visited `$obj->method(...)`, `Class::method(...)`, or
  `func(...)` reached `getArgs()`, which asserts it is not called on a first-class
  callable and fataled the entire process. Both rules now skip first-class
  callables (they carry no trailing flag argument to name) before that call.
  
- **`CollectedByAttributeRector`** now only rewrites a `newCollection()` override
  to `#[CollectedBy]` when the swap is behaviour-preserving. The attribute and the
  method do not resolve identically, so the rule was changing runtime collection
  resolution in two cases:
  
  - On Laravel 12 the attribute is read from the model's own class only (Laravel
    13 walks the parent chain), so a non-`final` base would lose its custom
    collection on subtypes. The rule now converts a `final` class only — the
    conservative gate that stays correct across the supported Laravel 12/13 range.
  - A `newCollection()` supplied by a trait or an ancestor model — including a
    trait method aliased to `newCollection` under any casing — is a real method
    that beats the attribute. The rule now skips any class where such a method
    would shadow it.
  

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.4.0...0.4.1

## 0.4.0 - 2026-06-09

<!-- verified-sha: b69e8af46f8eee6dbdcbb9ac277a951e5f049d29 -->
Three new rules — two Laravel 11+ attribute migrations and a test-assertion
simplification — plus a correctness fix to the nested eager-loading rule so it
fires through fluent query-builder chains it previously skipped.

### Added

- **`CollectedByAttributeRector`** (`Eloquent` set) — replaces a `newCollection()`
  override with the `#[CollectedBy]` attribute (Laravel 11+). Fires only when
  `newCollection()` is a single `return new SomeCollection($models)` whose return
  type matches the constructed class, on a class that extends
  `Illuminate\Database\Eloquent\Model`. The method is removed and
  `#[CollectedBy(SomeCollection::class)]` is prepended to the class. Overrides
  with extra logic are left untouched, and the rule is idempotent — it skips when
  `#[CollectedBy]` is already present.
- **`ObservedByAttributeRector`** (`Eloquent` set) — replaces `booted()` observer
  registration with the `#[ObservedBy]` attribute (Laravel 11+). Fires only when
  `booted()` is a single `static::observe(SomeObserver::class)` / `self::observe(...)`
  on a Model subclass. The method is removed and `#[ObservedBy(SomeObserver::class)]`
  is prepended. The observer argument must be a `::class` constant fetch — string
  literals are not converted — and the rule skips when `#[ObservedBy]` is already
  present.
- **`AssertModelExistsRector`** (`Testing` set) — rewrites a single-`id`
  `assertDatabaseHas(Model::class, ['id' => $model->id])` to the idiomatic
  `assertModelExists($model)`, and the `assertDatabaseMissing` form to
  `assertModelMissing($model)`. Only fires when the array holds exactly the `id`
  key and the model instance carrying it is in scope; multi-key arrays, table-name
  strings, and non-`id` checks are left alone.

### Fixed

- **`NestedArrayEagerLoadingRector`** now fires when the eager-load call sits behind
  a fluent query-builder passthru — e.g. `Model::query()->whereIntegerNotInRaw(...) ->oldest(...)->with([...])`. Such a passthru is forwarded to the base query
  builder via Eloquent's `Builder::__call()`, which collapsed the immediate
  receiver type out of the Eloquent allow-list and silently skipped an otherwise
  valid rewrite. The receiver check now walks the chain and accepts once an earlier
  receiver is Eloquent, while staying conservative: it climbs only past links typed
  as *exactly* the base `Illuminate\Database\Query\Builder` (which exposes no
  eager-load method, so the call can only be the runtime-Eloquent passthru), and
  never past the explicit exits `toBase()` / `getQuery()` or any other concrete
  type — so unrelated fluent `with([...])` APIs are still left untouched.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.3.0...0.4.0

## 0.3.0 - 2026-06-09

<!-- verified-sha: 87114eb6914ec5ab5cbba43c30280d9dd55b5fae -->
### Added

- **`NativeFunctionFlagArgumentToNamedRector`** (`CodeQuality` set) — names the opaque trailing bool/null flag argument of well-known native functions, so `in_array($needle, $haystack, true)` becomes `in_array($needle, $haystack, strict: true)`. Ships a curated default map (`in_array`/`array_search` → `strict`, `json_decode` → `associative`) that consumers extend or override via `function_flag_arguments`.
- **`FirstPartyFlagArgumentToNamedRector`** (`CodeQuality` set) — names an opaque trailing bool/null flag argument on a first-party method or static call, resolving the parameter name by reflection. Gated to your own namespaces via `first_party_namespaces` (default `App\`), so vendor signatures — whose parameter names can change under semver — are never touched.

Both fire only on a bare `true`/`false`/`null` literal in the final argument position (which keeps the call valid — a positional argument after a named one is a fatal), and skip already-named, unpacked, variadic-target, and unresolvable calls. Both are enabled by default in the `CodeQuality` set.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.2.1...0.3.0

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
