# Changelog

All notable changes to `hihaho/rector-rules` will be documented in this file.

## 0.11.1 - 2026-06-14

<!-- verified-sha: 2e9a7a829d62c1b566410a30b2c7acfd59c12a69 -->
A per-node performance pass on the routing and migration rules. No rule
behaviour changes — output is identical; this purely removes redundant
work the rules did on every AST node.

### Internal

- **Directory-context check is now memoized per file.** The routing rules
  (`NormalizeRoutePathRector`, `RouteGroupArrayToMethodsRector`) and
  `InlineMigrationConstantsRector` gate every matching node on whether the file
  sits under `routes/` or `migrations/`. That verdict is constant for a whole
  file, but `refactor()` runs per node — so the path scan re-ran on every
  `StaticCall` and `ClassConstFetch` (`::class`), two of the most common node
  types in any codebase. The verdict is now computed once per file via an
  internal cache.
  
- **Cheap structural gates run before the directory check.** The `::class` skip
  in `InlineMigrationConstantsRector` and the method-name gate in the routing
  rules now precede the directory lookup, so the overwhelmingly common
  non-matching node bails at the cheapest possible check.
  
- Together these cut per-node overhead on the directory-gate hot path by ~40%
  in a synthetic benchmark.
  

Behaviour is unchanged for every existing fixture — the rules transform exactly
the same code as before.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.11.0...0.11.1

## 0.11.0 - 2026-06-14

<!-- verified-sha: b2c0be83ec6e1806eb41c0292c2f7cab21c36a3f -->
A new `CODE_QUALITY` rule that drops redundant default-valued arguments, plus an
opt-in knob on `FirstPartyFlagArgumentToNamedRector` for naming leading positionals.

### Added

- **`RemoveDefaultValuedArgumentRector` (in the `CODE_QUALITY` set).** Drops an
  argument whose value equals the callee parameter's default — the "skip optional
  parameters" convention — so a call states only what differs from the default:
  
  ```diff
  -$user->factory()->withPosts(callback: null, times: 2);
  +$user->factory()->withPosts(times: 2);
  
  
  ```
  By default it drops an already-named default argument (order-independent) or a
  trailing positional default (iteratively), and it fires on any callee — those drops
  couple only to the default *value*. An opt-in `cascade_drop` additionally drops a
  *mid*-positional default by naming the arguments after it
  (`$factory->attach($user, [], $relationship)` → `attach($user, relationship: $relationship)`);
  because that couples to parameter names, it is first-party only (gated by
  `first_party_namespaces`, default `App\`).
  
  The drop is deliberately conservative: only a side-effect-free constant *literal* is
  removed — never a call or variable that merely *resolves* to the default value, so an
  expression's evaluation is never silently dropped. Matching is strict on type and
  value (`0` is not dropped against a `false` default), a class constant resolving to a
  scalar counts, and enum-case objects, computed-expression defaults, first-class
  callables, unpacked arguments, and variadic targets are all left alone.
  
- **`FirstPartyFlagArgumentToNamedRector` gains a `name_preceding_positionals` knob.**
  Off by default. When enabled, a call that already carries a named argument *in source*
  also has its leading positional arguments named:
  
  ```diff
  -$store->paginate(1, perPage: 50);
  +$store->paginate(page: 1, perPage: 50);
  
  
  ```
  First-party only (naming couples to the parameter name), and it leaves a call
  untouched when any argument is unpacked — naming a positional before a `...$spread`
  would be a fatal error. A call made "mixed" only because this rule just named its own
  trailing flag is not affected; the knob anchors on an argument named in the source.
  

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.10.0...0.11.0

## 0.10.0 - 2026-06-14

<!-- verified-sha: d46da662db36e5c514dcaee5ae7318a00b8c5a5f -->
A new `CODE_QUALITY` rule turns Laravel's array-setter `config()` call into the
explicit `config()->set()` form.

### Added

- **`ConfigSetMethodRector` (in the `CODE_QUALITY` set).** Rewrites the
  array-setter form of the `config()` helper —
  
  ```php
  config(['queue.default' => 'sync']);
  
  
  
  ```
  into the explicit setter form:
  
  ```php
  config()->set('queue.default', 'sync');
  
  
  
  ```
  A multi-key array is expanded into one `config()->set()` call per pair, in source
  order. The rule names the write, so a call that mutates configuration no longer
  reads like a lookup.
  
  Scope is deliberately narrow and safe:
  
  - It fires only when the `config([...])` call is the whole statement — never inside
    an assignment, condition, or other expression (where multi-key expansion would be
    invalid).
  - Only string-literal keys convert; a dynamic key (`config([$key => $v])`), a
    class-constant key (`config([Config::KEY => $v])`), and an empty array are left
    untouched.
  - The original function-name node is preserved, so a fully-qualified
    `\config([...])` keeps resolving to the global helper after the rewrite.
  - First-class callables (`config(...)`) are skipped, and any leading comment or
    suppression marker on the statement is carried onto the rewritten call.
  

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.9.4...0.10.0

## 0.9.4 - 2026-06-14

<!-- verified-sha: 05b561a3b1c34a238d44b616be2fab68ff720065 -->
`MiddlewareStringToClassRector` now reaches two more places string middleware
references live.

### Added

- **`MiddlewareStringToClassRector` converts the `bootstrap/app.php` middleware
  configurator and controller value objects.** In addition to `->middleware()` /
  `withoutMiddleware()` on routing objects, the rule now rewrites:
  
  - the middleware configurator — `$middleware->group($name, [...])` (the group
    middleware, never the name), `$middleware->append(...)`, and `prepend(...)`.
  - Laravel 11+ controller `new Middleware('auth:sanctum')` value objects (the
    `HasMiddleware::middleware()` return shape).
  
  The single-`$middleware` sinks resolve that argument **name-aware**: the
  `middleware` parameter is matched by name when the call uses PHP 8 named arguments
  (e.g. `new Middleware(only: [...], middleware: '...')`), and by source position
  otherwise — so the wrong argument is never rewritten. The same default convert-set
  applies (`auth`/`guest` excluded unless opted in), since every surface routes
  through the same conversion core.
  
  `throttle` conversion still requires an explicit `throttle_class` (it cannot be
  inferred from the call site or reliably from project files).
  

### Internal

- The duplicated Eloquent model-inspection helpers (`isEloquentModel()` plus the
  attribute-presence check) shared by `ObservedByAttributeRector` and
  `CollectedByAttributeRector` are extracted into a single
  `Eloquent/Concerns/InspectsEloquentModel` trait — behaviour-preserving, no fixture
  changes.
- CI GitHub Actions bumped (`actions/checkout`, `shivammathur/setup-php`,
  `actions/cache`), and the fully-implemented spec files were removed from the repo.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.9.3...0.9.4

## 0.9.3 - 2026-06-14

<!-- verified-sha: fae7f1aa3587ed2c9b0873b6d338e1288d0372e9 -->
Removes a Rector 2.4.5 deprecation warning, and closes a behaviour-change footgun
in `MiddlewareStringToClassRector`'s default surfaced by real-world adoption.

### Changed

- **`MiddlewareStringToClassRector` no longer converts `auth` / `guest` by default.**
  Converting a string alias to its hardcoded *framework* middleware class is only
  behaviour-preserving when the application leaves that alias at the framework default.
  `auth` and `guest` are the aliases apps most often remap to a custom subclass (a
  custom `Authenticate` / `RedirectIfAuthenticated` carrying real logic) in the
  middleware-alias map — and the rewrite would silently bypass that logic, invisibly,
  since the helper returns a resolver string. The rule cannot read a consumer's alias
  map from the call site, so `auth` and `guest` are now excluded from the default
  convert-set.
  
  This is a behaviour change for consumers of this **opt-in** rule (it is in no set)
  who relied on `auth`/`guest` converting by default. To restore the old behaviour
  after confirming those aliases are unremapped in your app, list them explicitly:
  
  ```php
  ->withConfiguredRule(MiddlewareStringToClassRector::class, [
      MiddlewareStringToClassRector::ALIASES => [
          'auth', 'auth.basic', 'can', 'guest', 'password.confirm', 'signed', 'verified',
      ],
  ])
  
  
  
  
  
  ```

### Fixed

- **`NamedArgumentFromManifestRector` no longer overrides the deprecated
  `beforeTraverse()`.** Rector 2.4.5 deprecates overriding `beforeTraverse()` and emits a
  runtime `[WARNING]` on every run that uses the rule. The once-per-file manifest-record
  setup now runs in a `FileNode` branch of `refactor()` — Rector's recommended file-level
  hook, visited before the call nodes (same ordering the override gave). The rule's
  matching logic and manifest schema are unchanged.
- The `MiddlewareStringToClassRector` class docblock no longer claims the rewrite is
  unconditionally "behaviour-preserving" — it is, only for an alias still pointing at the
  framework class.

### Documentation

- The README manifest section now points at the ready-made manifest **producer** shipping
  in [`hihaho/phpstan-rules`](https://github.com/hihaho/phpstan-rules), and documents two
  consumer-found wiring caveats: `ManifestCacheMetaExtension` needs the classic
  `RectorConfig` callback style (the fluent `configure()` builder cannot register a tagged
  singleton), and agent-wrapped runs need `PAO_DISABLE=1`.

### Internal

- A regression test pins that `NamedArgumentFromManifestRector` no longer overrides
  `beforeTraverse` and registers `FileNode`.
- New `MiddlewareStringToClassDefaultAliasesTest` proves the default skips `auth`/`guest`
  while still converting the behaviour-safe aliases; the existing suite now enables all
  seven aliases explicitly to keep exercising the conversion mechanics.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.9.2...0.9.3

## 0.9.2 - 2026-06-14

<!-- verified-sha: 93dd29e3fa82563d94d776819c59faaafc57d534 -->
`NamedArgumentFromManifestRector` now validates its manifest on load, and a
cache-key collision on an unreadable manifest is fixed.

### Fixed

- **The manifest is validated on load.** Previously a malformed manifest threw a
  raw `JsonException`, and a structurally-wrong record reached `basename()` with an
  undefined key — a PHP warning that could mis-fire on the wrong file. Now:
  
  - Invalid JSON or a non-array payload throws an `InvalidArgumentException` that
    names the manifest path and the underlying cause, instead of a bare
    `JsonException`.
  - A single structurally-invalid record — missing key, wrong scalar type, or an
    empty `file`/`method`/`paramName` — is skipped, so one bad line never fails a
    whole-codebase run. (An empty `paramName` would otherwise become
    `new Identifier('')` and emit invalid PHP.)
  
  Valid manifests are unaffected; the matching logic is unchanged.
  
- **`ManifestCacheMetaExtension` no longer collapses an unreadable manifest's hash
  to the empty string.** `hash_file()` returns `false` on an unreadable file, and
  the old `(string)` cast turned that into `''` — so every unreadable manifest
  produced the same cache key, defeating invalidation. `getHash()` now pre-checks
  `is_readable()` (side-effect-free, no `hash_file()` warning) and returns a
  distinct `'manifest-unreadable'` sentinel, keeping a `=== false` guard for the
  vanished/locked-between-checks race.
  

### Internal

- Added `ConfigureManifestTest` (malformed JSON, non-list payload, skipped invalid
  record alongside a co-located valid one, wrong scalar type, missing-file no-op)
  and an unreadable-manifest hash test (skip-guarded for filesystems that ignore
  `0000`).
- README documents the new fail-loud / skip-bad-record validation behaviour.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.9.1...0.9.2

## 0.9.1 - 2026-06-14

<!-- verified-sha: f9c49c37824fed3f5a4c178fb93148068e5f107e -->
Method-name matching across five rules is now case-insensitive, the way PHP
itself treats method names.

### Fixed

- **Mixed-case method calls are no longer silently skipped.** PHP method names
  are case-insensitive, but six gates across five rules compared a method name
  with an exact string check, so a mixed-case spelling slipped through:
  
  - `ObservedByAttributeRector` now matches `static::Observe(...)`.
  - `RemoveAfterColumnPositioningRector` now matches `->After(...)`.
  - `NormalizeRoutePathRector` and `RouteGroupArrayToMethodsRector` (via the
    shared `ChecksRouteContext`) now match `Route::GET(...)`, `Route::GROUP(...)`,
    and other mixed-case verbs.
  - `FlagColumnToBooleanRector` now matches `$table->TinyInteger(...)`.
  
  These were missed transforms — the rules simply did nothing on a mixed-case
  call that they handle in lowercase.
  
- **Correctness fix in `FlagColumnToBooleanRector`'s skip guard.** The guard that
  leaves a column-modifying migration alone keyed on exact `->change()` /
  `->autoIncrement()` spellings. A mixed-case `->Change()` slipped the guard, so
  the rule could **wrongly convert** a `tinyInteger(...)->Change()` migration to
  `boolean(...)`. The guard now matches case-insensitively and correctly skips it.
  

Behaviour is unchanged for the lowercase spellings every existing fixture uses.

### Internal

- Six regression fixtures added (one per fixed site), covering both the
  now-matched transforms and the skip-guard correctness case.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.9.0...0.9.1

## 0.9.0 - 2026-06-14

<!-- verified-sha: cb2e8c017108aec9d1a3419e0c0871df048fc870 -->
A new opt-in routing rule converts magic-string middleware references to
Laravel's class-based fluent form.

### Added

- **`MiddlewareStringToClassRector`** — rewrites string route-middleware
  references to the class-based fluent helpers Laravel 10.9+ ships
  (`Authenticate::using('sanctum')`, `Authorize::using('viewAny', 'post')`,
  `ValidateSignature::relative()`, …). Each helper returns the *same* resolver
  string the alias would produce, so the rewrite is behaviour-preserving — it
  just makes the reference refactor-safe and IDE-navigable instead of a magic
  string:
  
  ```php
  Route::middleware('auth:sanctum')
      ->group(fn () => Route::get('/posts', PostController::class)->middleware('can:viewAny,post'));
  // ->
  Route::middleware(\Illuminate\Auth\Middleware\Authenticate::using('sanctum'))
      ->group(fn () => Route::get('/posts', PostController::class)->middleware(\Illuminate\Auth\Middleware\Authorize::using('viewAny', 'post')));
  
  
  
  
  
  
  
  
  ```
  It is **not in any set** and reachable by FQN only — Laravel doesn't document
  this form as a recommended convention, so adopting it is a deliberate choice.
  
  - Rewrites string and array-of-string arguments to `->middleware()`,
    `Route::middleware()`, and `withoutMiddleware()`, gated on a receiver that
    resolves to an Illuminate routing type — an unrelated `->middleware()`
    method is never touched.
  - Converts the first-party aliases `auth`, `auth.basic`, `can`, `guest`,
    `password.confirm`, `signed`, `verified`. Group names (`web`, `api`),
    custom/package aliases, variables, and already-class-form references are
    left alone. `can:` model arguments stay string literals — never upgraded to
    `::class`, which would change the authorisation target.
  - Bare no-parameter aliases convert to `::class` by default; set
    `convert_bare_aliases => false` for `alias:param` forms only.
  - **`throttle` is opt-in.** Its target class (`ThrottleRequests` vs
    `ThrottleRequestsWithRedis`) depends on app-global configuration that is
    invisible at the call site, so the rule will not guess it — converting
    blindly would silently switch a Redis-throttling app to the database
    limiter. Enable it with `include_throttle => true` and an explicit
    `throttle_class`; then `throttle:api` → `{class}::using('api')` and
    `throttle:60,1` → `{class}::with(60, 1)`.
  

### Internal

- 24 fixtures cover the conversions (every alias, parameterised and bare, array
  and variadic arguments, `withoutMiddleware`, the `signed`/`verified`/throttle
  special-case helpers) and the skips (non-route receiver, unknown/custom alias,
  group name, already-class form, variable argument, unround-trippable
  parameter, throttle-disabled, bare `can`), across default, throttle-enabled,
  and bare-disabled configurations.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.8.0...0.9.0

## 0.8.0 - 2026-06-14

<!-- verified-sha: a4c3b3288368c55bba29b9d13deed58c7f732124 -->
A new **manifest-bridge** rule closes the one gap
`FirstPartyFlagArgumentToNamedRector` cannot reach: call sites whose receiver
type only resolves under a PHPStan extension such as larastan.

### Added

- **`NamedArgumentFromManifestRector`** — names arguments from a JSON manifest
  produced by an external analyser, with no type resolution of its own.
  `FirstPartyFlagArgumentToNamedRector` names a flag only when Rector's own
  (bare-PHPStan) resolution can identify the receiver, so it misses sites whose
  type only resolves under a framework extension — a generic-inherited property,
  a model `@property` chain — which Rector cannot load into its own engine. A
  larastan-powered PHPStan rule (run consumer-side) emits those findings; this
  rule applies them by matching the call site:
  
  ```php
  ->withConfiguredRule(NamedArgumentFromManifestRector::class, [
      NamedArgumentFromManifestRector::MANIFEST => __DIR__ . '/named-arguments-manifest.json',
  ])
  
  
  
  
  
  
  
  
  
  ```
  Each manifest record is `{file, line, method, argIndex, paramName, value?}`.
  `method` is the method name for a method/static call (never namespaced) or the
  resolved class FQCN for a `new` expression; the optional `value` is a literal
  flag the argument must still hold — a drift guard so a stale line never
  mis-names a since-changed argument.
  
  The rule is **not in any set** and is a **no-op until configured** with a
  manifest path. It only names positional, not-yet-named, non-unpacked
  arguments, skips first-class callables, and refuses any rename that would leave
  a positional argument after a named one (invalid PHP — when the manifest named
  a non-trailing argument without its trailing siblings). Records are resolved
  once per file, so the per-node hot path stays a single bool check.
  
- **`ManifestCacheMetaExtension`** — keeps the bridge cache-correct. Rector keys
  its per-file cache on source content and configuration parameters, never the
  content of a file a rule points at, so a regenerated manifest over unchanged
  source would be served from cache and silently skipped. Registering this
  extension folds the manifest's hash into the cache key: Rector reprocesses
  exactly when the manifest content changes, and keeps the cache while it is
  stable. Consumers who would rather not wire anything can instead run the pass
  with `rector process --no-cache`. Both paths are documented in the README.
  

### Internal

- Repository aligned with the canonical package setup: `.editorconfig`,
  corrected workflow badge URLs, refreshed `.gitattributes` / `.gitignore`,
  `phpunit.xml.dist` → `phpunit.xml`, and additional dev dependencies
  (`laravel/pao`, `mrpunyapal/rector-pest`, `nunomaduro/collision`,
  `pestphp/pest-plugin-arch`).
- 14 fixtures cover the rule's conversions (method, static, constructor,
  namespaced constructor, null literal, cascade) and skips (already-named,
  value drift, unpacked, method/line mismatch, arg-index out of range,
  first-class callable, trailing-positional).

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.7.0...0.8.0

## 0.7.0 - 2026-06-13

<!-- verified-sha: 9755a1ebc7d91cb64a899688f5f79eaea7b503ce -->
`FirstPartyFlagArgumentToNamedRector` gains an opt-in **cascade** mode for the
call shape it previously left alone: a bare flag that is not the last argument.

### Added

- **`FirstPartyFlagArgumentToNamedRector` — `cascade_trailing_args` config**
  (default `false`). By default the rule names a bare `true`/`false`/`null` flag
  only when every argument to its right is already named or is itself a flag
  being named (the trailing "namable run"), so a flag followed by a positional
  non-flag is left untouched — naming it would force that non-flag to be named
  too. With `cascade_trailing_args` on, the rule does exactly that: it names the
  flag and the positional arguments after it, which PHP requires (a positional
  argument cannot follow a named one):
  
  ```php
  $store->loadCount(true, $start, $end);
  // ->
  $store->loadCount(hasStarted: true, start: $start, end: $end);
  
  
  
  
  
  
  
  
  
  
  ```
  The run is always anchored on a flag, so a call with no bare flag is never
  touched, and it still stops at an unpacked argument or a variadic/unknown
  parameter. It is off by default because it produces broader diffs — the
  trailing non-flag arguments are named purely to satisfy PHP's ordering rule.
  Enable per consumer with
  `['cascade_trailing_args' => true]`.
  

### Internal

- The reflection-free pre-gate is cascade-aware, so the per-node hot path stays
  fast — callee resolution still runs only when a flag is actually present to
  rename.
- Added a second test class and config exercising the cascade path
  (flag-first, flag-in-middle, and the no-flag skip); default-mode fixtures are
  unchanged.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.6.0...0.7.0

## 0.6.0 - 2026-06-13

<!-- verified-sha: e68df4906eb10d8608bc1adb1c629178591aa1f9 -->
`FirstPartyFlagArgumentToNamedRector` reaches more call sites. It previously
named only the single last positional bool/null flag of a first-party method or
static call; flags in deeper positions, on nullable receivers, and on
constructor calls slipped through unnamed. It now resolves all three.

### Changed

- **`FirstPartyFlagArgumentToNamedRector`** names flags in three more shapes:
  
  - **Trailing namable run** — a bare flag followed only by already-named
    arguments (or other flags being named) is named, not just the absolute last
    argument: `$store->configure($key, false, isBoolean: true)` →
    `$store->configure($key, setDefaultNullValue: false, isBoolean: true)`.
  - **Nullable receivers** — a flag call on a `Foo|null` receiver (the usual
    shape of a docblock-typed nullable property) resolves by stripping null
    before the single-class lookup, instead of being silently skipped.
  - **Constructor (`new`) calls** — `new TokenStore($platform, true, false)` →
    `new TokenStore($platform, inherit: true, shared: false)`.
  
  The safety guard is preserved: a flag is named only when every argument to its
  right is already named or is itself a flag being named, so the result is never
  invalid PHP, and a flag whose naming would force a non-flag positional argument
  to be named too is left alone. A cheap, reflection-free pre-gate keeps the
  per-node cost off the hot path — callee resolution runs only when a flag is
  actually present to rename.
  

### Internal

- Expanded fixture coverage: nullable receiver, flag-before-named-argument,
  single and consecutive constructor flags, and the trailing-safe skips
  (flag-before-positional and untyped/unresolvable receiver).

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.5.0...0.6.0

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
