# Changelog

All notable changes to `hihaho/rector-rules` will be documented in this file.

## 0.22.0 - 2026-08-31

### Performance

**An edit no longer costs a full rescan.** 0.21.0 cached the suffix scan's decisions against a digest of the whole corpus, so any edit invalidated the entry and the next run re-read and re-parsed every file. Across an editing session that is every run, which is where the remaining cost landed — [#17](https://github.com/hihaho/rector-rules/issues/17) reports about 4.8 s per edit against 1.5 s for a repeat run on a 9,000-file project.

Underneath that cache there is now a per-file layer, keyed on each file's own size and timestamps. Editing one file re-parses that file; every other file costs a `stat`. Measured here on a 3,000-file corpus at a realistic ~4.5 KB per class, the penalty for an edit before a single-file run:

| | 0.21.0 | 0.22.0 |
|---|---|---|
| run after an edit | 1.44 s | 1.01 s |
| run with no changes | 0.97 s | 0.97 s |

The edit penalty goes from 0.47 s to about 0.04 s. A larger project should see a larger absolute saving, since the cost this removes scales with the corpus.

**Only syntax is cached per file** — the class-like names a file declares and the name, parent and modifiers of its classes. That is a pure function of the file's bytes, which is what makes the file's own digest a complete key for it. Whether a class is a rename *candidate* depends on reflection over its parent and so spans files and installed packages; that verdict is recomputed on every run and never cached.

A file the scan cannot read is not remembered as declaring nothing. A failed read leaves size and timestamps untouched, so an entry written from one would be reused indefinitely and quietly drop the file out of collision detection.

### Changed

- **`newShortNameFor()` takes a `ClassDeclaration` instead of a `Class_`.** Only affects a rule that extends `AbstractAddSuffixRector` **and overrides that method**; implementing `baseClass()` and `suffix()` is unaffected. The value object is what lets a cached file answer without being parsed. See `UPGRADING.md`.

### Upgrading

```bash
composer update hihaho/rector-rules

```
Both cache layers live under Rector's cache directory and `--clear-cache` bypasses them.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.21.0...0.22.0

## 0.21.0 - 2026-08-31

### Fixed

**A rename whose file could not be moved still had its references rewritten.** When a suffix rule cannot rename the declaring file — an unwritable directory, say — it refuses the rename outright, because a renamed class in a file that kept its old name is exactly the broken tree these rules exist to prevent. That refusal reached the rule but not Rector's rename collector, so `RenameClassRector` went ahead and rewrote every reference to a name the declaration never took.

Present since the suffix rules started renaming files in 0.17.0. Covered by a test that fails on 0.20.0's code.

### Performance

**The pre-scan is now reused across processes and runs.** Reported in [#17](https://github.com/hihaho/rector-rules/issues/17). Rector's parallel mode gives every worker its own container, so every worker's rule constructors repeated the whole corpus scan — an instrumented run on a 3000-file corpus did it 26 times. The main process always scans first, since it builds the container that schedules the work, and every worker starts after it finishes.

The scan's decisions now go to a cache file under Rector's cache directory. Workers read what the main process wrote, and an unchanged tree reuses it on the next run too.

Measured on 3000 files at a realistic ~4.5 KB each, 8 workers:

| | CPU | wall |
|---|---|---|
| 0.20.0 | 9.80 s | 2.61 s |
| 0.21.0, first run | 6.29 s | 2.03 s |
| 0.21.0, unchanged tree | 5.86 s | 1.62 s |

Within a single process, a scan that costs 328 ms cold answers in 16.5 ms warm.

**The trade:** the cache key includes a digest of every corpus file's size and modification time, which costs a `stat` per file. A cold scan in a single process is therefore about 20% slower than in 0.20.0. Every other shape — any parallel run, any repeat run — is faster.

**What the entry is keyed on.** The corpus digest alone is not enough: whether a class is a rename candidate is answered by reflection over its parent, so the answer moves when the installed packages move — a `composer update` that changes a framework base class — or when this package's own rules change, and neither touches a corpus file. Both are in the key, alongside the resolved paths, the skip configuration and the destination substrings the registered rules declared. `--clear-cache` bypasses the cache; every failure mode is a miss rather than a wrong answer, so an unreadable, truncated, foreign or malformed entry is discarded and the corpus is scanned.

**Two limits worth knowing.** Modification and change times are second-granular, so a corpus whose files were written in the current second is not cached at all, rather than cached against a digest an equal-length edit could slip past. And a class that a corpus class extends, living outside both the configured paths and `vendor/`, is invisible to every digest — put it under `withPaths()` so changes to it are seen.

The cache directory is created `0700` and per-user, because it sits at a predictable path in the system temp dir and an entry is trusted enough to drive renames across a codebase.

**What this does not change:** the scan still runs while the container is built, before Rector knows what it was asked to process, so a cold run targeting a single file still walks the whole corpus once. Narrowing that needs the target set at construction time, which Rector does not expose — `Option::SOURCE` never reaches the parameter provider, and `AbstractRector::beforeTraverse()` is `final`. #17 stays open for it.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.20.0...0.21.0

## 0.20.0 - 2026-08-31

### Performance

**The suffix rules' corpus pre-scan is roughly 3.5× faster and uses 43% less memory.** Reported in [#17](https://github.com/hihaho/rector-rules/issues/17): `AddCommandSuffixRector`, `AddMailSuffixRector`, `AddNotificationSuffixRector` and `AddResourceSuffixRector` build their rename map by scanning every file under `withPaths()`, and the scan runs while the container is built — so it happens on every process, including a run targeting a single file, and again in every parallel worker.

Measured over a synthetic 3000-file corpus, one container build's worth of scanning:

| | before | after |
|---|---|---|
| scan | 932 ms | ~280 ms |
| peak memory | 188 MB | 68 MB |

End to end through the `rector` binary on the same corpus, a one-file run went from 2.60 s to 1.70 s.

What changed:

- **Every file was being read and parsed twice**, once to collect the class-like names a rename could collide with and once to collect the classes themselves. Both now come out of one parse.
- Name resolution and the search for declarations run in **one traversal that stops at class bodies**. Resolving every name inside every method body was most of the traversal cost, and none of it was used.
- Files that can hold **neither a rename candidate nor a colliding name** are no longer parsed at all. A candidate has to extend something, and a colliding name has to spell one of the suffixes the rules rename to — both are decided from the file's bytes, behind a single read.
- The corpus **directory listing is resolved once** instead of once per rule.
- Retained class nodes **drop their method bodies**. Only the name, parent and modifiers are read after the scan.

The remaining cost is one read and one parse per file that survives the filter. Each parallel worker still runs its own scan; sharing one scan across workers is not part of this release.

### Changed

- **A file whose only other class is anonymous is now renamed.** The rules leave a file alone when it declares more than one class, because renaming it would break PSR-4 for the classes that were not renamed. That count used to include anonymous classes inside method bodies, which have no name and no PSR-4 path. See `UPGRADING.md`.
- A suffix rule that renames to a name outside the destination substrings it declared now fails loudly instead of silently skipping the collision check for that name. This is reachable only from a custom rule extending `AbstractAddSuffixRector`.

### Internal

`SuffixRenameMap::register()` takes the rule's destination substrings, and the filesystem side of the scan moved to a new `CorpusFiles`. Both are `@internal`; a rule extending `AbstractAddSuffixRector` needs no changes, and its own suffix widens the scan's filter automatically.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.19.0...0.20.0

## 0.19.0 - 2026-08-31

### Fixed

**Rector 2.6.5 compatibility.** Rector 2.6.5 removed `RelatedConfigInterface` ([rector-src#8395](https://github.com/rectorphp/rector-src/pull/8395)). The four suffix rules implemented it, so any run that loaded them died before analysis:

```
[ERROR] Interface "Rector\Contract\DependencyInjection\RelatedConfigInterface" not found




```
That interface was also how the rules pulled in their rename-propagation wiring — the `SuffixRenameMap` singleton, `RenameClassRector`, and `RenameDocBlockSeeTagRector`. Removing the `implements` on its own would have left the rules renaming declarations while every reference and every `@see`/`@link`/`@uses` tag kept pointing at a class that no longer exists.

The wiring now lives in the package's own `config/config.php`, which reaches consumers two ways:

- Imported by `config/sets/naming.php`, so `HihahoSetList::NAMING` needs nothing else. This is the recommended path.
- Auto-included through `extra.rector.includes`, which Rector only honours when the optional `rector/extension-installer` plugin is allowed. That covers `->withRules([AddNotificationSuffixRector::class])` without a set.

Both rules short-circuit on an empty rename map, so registering them unconditionally costs nothing when no rename is found.

If neither path applies — the installer plugin is not allowed *and* the rule is registered directly rather than through the set — a suffix rule now aborts the run with a message naming the ways to fix it, instead of renaming declarations and leaving every reference behind.

On `rector/rector` below 2.6.5 that combination used to work through `RelatedConfigInterface`, so this is a behaviour change for anyone on an older Rector who registers a suffix rule directly without the installer plugin. It fails loudly, and either switching to `HihahoSetList::NAMING` or allowing the plugin restores it.

### Changed

- **`rector/extension-installer` is suggested, not required.** Its generated config is what Rector's `ExtensionConfigResolver` reads to honour `extra.rector.includes`, so allowing it is what lets a `withRules([...])`-only setup keep reference propagation. It stays optional because requiring a Composer plugin would hard-fail `composer install --no-interaction` for any project whose `allow-plugins` map does not already list it.
- `config/related/rename-propagation.php` is gone; its contents moved to `config/config.php`. It was never public API — no rule class, set list constant, set file, or configuration constant referenced it.
- **`RenameClassRector` and `RenameDocBlockSeeTagRector` are now registered wherever `config/config.php` is loaded**, not only for runs that include a suffix rule — so any set from this package, and any consumer with the installer plugin allowed, gets them. Both return early on an empty rename map, so a run with no renames is unaffected. One visible consequence: if you configure `RenameClassRector` yourself, its renames now also get `@see`/`@link`/`@uses` tags rewritten.

### Upgrading

Update and re-run:

```bash
composer update hihaho/rector-rules
vendor/bin/rector process --dry-run




```
If you pinned `rector/rector` to `>=2.6.2 <2.6.5` to work around the fatal, drop the pin.

See `UPGRADING.md` for the one behaviour change and how to restore the old behaviour if it affects you.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.18.0...0.19.0

## 0.18.0 - 2026-08-14

### Fixed

#### `@see`, `@link` and `@uses` now follow a rename

0.17.0 made the suffix rules rename declarations, references, imports and the declaring
file together. One class of reference was still left behind.

Rector's docblock renamer only visits type positions — `@param`, `@return`, `@var` — so
`@see`, `@link`, `@uses` and their inline `{@see …}` forms kept naming a class that no
longer existed, in every form: short, fully qualified, and with a `::member` suffix.

Worse, when a class was referenced **only** from such a tag, its `use` import was neither
rewritten nor removed. `RenameClassRector` only rewrites an import it also sees used
somewhere in the AST, and a docblock-only mention gives it nothing to see — so the import
was left naming a class that no longer exists. Valid PHP, since imports resolve lazily,
and reported as **zero errors** by PHPStan at level max with strict rules and 100% type
coverage. The same silent shape as the command-discovery loss 0.17.0 fixed.

Both are now handled. No configuration changes; the pass is registered alongside the
suffix rules.

### Added

Three deliberate refusals, so the rewrite cannot make things worse:

- An **explicitly aliased** reference (`use App\Old as Legacy;` → `{@see Legacy}`) is left
  alone. The alias survives the import rewrite, so the tag is already correct.
- A short name matching **two** renamed classes is never guessed at.
- **Type tags are never touched** here — Rector's own renamer owns those.

A short reference that only resolved through an import is rewritten fully qualified, so
the tag stops depending on an import that may later be dropped as unused. One resolved
inside the file's own namespace stays short.

### Internal

The import is rewritten too, but only once the old short name has gone from the rest of
the file. Doing it eagerly pulls the import out from under Rector's docblock renamer
mid-run, which then cannot resolve short names in type tags — caught by an existing
`@var` test. Rector's per-file fixed-point loop supplies the later pass in which the
rewrite is safe.

### Known limitations

Unchanged from 0.17.0 — configure paths via `withPaths()`, references spelled in a
different case than the declaration are not rewritten, and `withImportNames(removeUnusedImports: true)`
gives the cleanest output.

Class names mentioned in ordinary prose — comments, Markdown, fixture strings — are not
touched, and should not be. Budget a grep for the old names once a rename lands.

### What's Changed

* ci: bump actions/checkout from 7.0.0 to 7.0.1 in the actions group by @dependabot[bot] in https://github.com/hihaho/rector-rules/pull/16

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.17.0...0.18.0

## 0.17.0 - 2026-08-14

### Breaking

#### The suffix rules now rename files

`AddNotificationSuffixRector`, `AddCommandSuffixRector`, `AddMailSuffixRector` and
`AddResourceSuffixRector` renamed the class declaration and stopped there. Every
reference kept pointing at the old name, and the file kept its old name — so the class
stopped matching its PSR-4 path. Running any of them on an autoloaded directory left a
tree that did not autoload. Worse, classes discovered by path rather than by reference —
Artisan commands, Livewire components, Filament resources — simply disappeared, with
nothing in a quality gate to report it.

All four rules now do the whole job: the declaration is renamed, every reference is
rewritten (`new`, `::class`, type hints, docblocks, imports), and the declaring file is
renamed to match.

Nothing in your `rector.php` has to change — but the diff these rules produce now
contains file renames. Run `--dry-run` first. See [UPGRADING.md](UPGRADING.md) for the
migration notes.

### Added

- Reference rewriting is handled by `RenameClassRector`, which the suffix rules now
  register themselves. `->withRules([AddNotificationSuffixRector::class])` is enough; no
  extra configuration.
- Renames are refused rather than forced when the destination name is already taken — by
  a class, interface, trait or enum, compared case-insensitively — when two classes would
  converge on one name, when two rules claim one class for different names, or when the
  target directory is not writable. Files holding more than one class are left where they
  are, as are files whose name never matched the class.
- Declarations under a `withSkip()` path are excluded from the rename map entirely, so
  their references are not rewritten either.
- `--dry-run` reports the rename and never touches the filesystem.

### Fixed

- Dropped `rector/type-perfect`. Its services now collide with the copy bundled in
  `tomasvotruba/type-coverage` 2.3, which prevented PHPStan from building its container
  at all.

### Deprecated

- `Hihaho\RectorRules\Caching\ManifestCacheMetaExtension`. Rector 2.6 retired
  `CacheMetaExtensionInterface` ("no longer applied"), so the class is a no-op. It will
  be removed in the next major. Let Rector manage its own cache, or clear the cache
  directory in CI.

### Internal

To keep the result independent of the order Rector happens to process files in — and of
how many parallel workers it spreads them over — the rules scan the configured paths once
before traversal begins, rather than registering each rename as they meet it. Rector walks
files in name order and never revisits an earlier one, and each worker holds its own
rename collector, so a map built during traversal only ever reaches files that sort after
the declaration in the same worker.

On a 2,000-file corpus the scan costs roughly 250 ms per worker process; the four rules
share it, so enabling more than one is nearly free.

Rector has no file-move API, so the file rename runs once every file has been written. It
is guarded on the basename matching the old class name, the new declaration actually
being present on disk, the destination being free, and the class being alone in its file.

### Known limitations

- Give Rector its paths through `withPaths()` in `rector.php`. Paths supplied only as
  command-line arguments are not visible early enough for the pre-scan, and the rules fall
  back to registering each rename as they meet it — still correct for the class, the file
  and later-processed references, but a reference in an earlier-processed file can be
  missed.
- A reference spelled in a different case than the declaration (`new ORDERSHIPPED()`) is
  not rewritten; Rector matches class names exactly.
- Enable `withImportNames(removeUnusedImports: true)` for clean output. Without it,
  rewritten references are fully qualified and the now-unused `use` is left behind.

### What's Changed

* ci: refresh the Rector and PHPStan result caches instead of freezing them by @SanderMuller in https://github.com/hihaho/rector-rules/pull/15
* ci: bump the actions group across 1 directory with 3 updates by @dependabot[bot] in https://github.com/hihaho/rector-rules/pull/14

### New Contributors

* @SanderMuller made their first contribution in https://github.com/hihaho/rector-rules/pull/15

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.16.1...0.17.0

## 0.16.1 - 2026-07-01

### Fixed

- **`RemoveUnnecessaryNullsafeOperatorRector` now keeps fluent chains multi-line.**
  Removing a `?->` rebuilds the call as a fresh `MethodCall` node, which makes Rector
  reprint it — and the reprint dropped the original line break when the call sat on its
  own line in a fluent chain, collapsing a formatted chain onto one line. The rule now
  re-stamps the fluent-newline flag, but only when the call genuinely was on its own line,
  so inline calls stay inline. The shared "was on its own line" detection is extracted
  into a `PreservesFluentNewline` trait, reused by `RemoveDefaultValuedArgumentRector`
  (which already carried the same logic). Surfaced while adopting the per-node fluent
  formatting approach against a real application.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.16.0...0.16.1

## 0.16.0 - 2026-06-29

### Changed

- `RouteGroupArrayToMethodsRector` — generated fluent chains now emit each step on its own line. Previously the rule produced a single-line chain (`Route::middleware('web')->prefix('admin')->name('admin.')->group(...)`); it now produces one method per line, consistent with standard Laravel fluent-chain style.

### Fixed

- `RemoveDefaultValuedArgumentRector` — when removing a default-valued argument from a `MethodCall` that was written on its own line in a multi-line fluent chain, the printer previously lost the line position and collapsed the chain. The rule now stamps `NEWLINE_ON_FLUENT_CALL` on the modified node so the line break is preserved.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.15.1...0.16.0

## 0.15.1 - 2026-06-23

### 0.15.1

#### Fixed

- **`TestFieldStringToConstantRector` now reads namespaced route files.** A route file
  with a non-braced `namespace App\Http\Controllers;` declaration wraps every following
  statement in a single namespace node. The resolver walked only the top-level statement
  list and skipped that wrapper, so a route file declaring a namespace contributed **zero**
  routes — the rule silently no-opped against any application whose route files are
  namespaced. The resolver now descends into namespace declarations (non-braced, braced,
  and multiple per file); fully-qualified name resolution is unchanged. Surfaced while
  adopting the rule against a real application's route files.

## 0.15.0 - 2026-06-23

### 0.15.0

Makes the opt-in `TestFieldStringToConstantRector` **self-resolving**: it now derives
everything it needs from your route files, with no generated manifest, no producer command,
and no application boot. Adopting it drops from running a per-project generator to three
lines of configuration.

#### Breaking

- **`TestFieldStringToConstantRector` configuration changed.** The `MANIFEST` constant is
  removed and replaced by three keys:
  
  ```php
  ->withConfiguredRule(TestFieldStringToConstantRector::class, [
      TestFieldStringToConstantRector::ROUTE_FILES => [__DIR__ . '/routes/web.php', __DIR__ . '/routes/api.php'],
      TestFieldStringToConstantRector::INTERNAL_MIDDLEWARE => [\App\Http\Middleware\Authenticate::class],
      TestFieldStringToConstantRector::FIRST_PARTY_PREFIX => 'App\\',
  ])
  
  
  
  
  
  
  
  
  
  
  ```
  The rule's purpose is unchanged — it aligns a test's request-payload field-name array
  keys with their endpoint's FormRequest constants, bidirectionally by endpoint (internal →
  constant, public → literal). Only how it obtains the route → request map and the
  internal/public classification changed: it parses the route files itself, reflects each
  route's controller action for its first FormRequest parameter, and classifies a route
  internal when a configured internal-middleware token appears in its statically-read
  middleware stack. See `UPGRADING.md` for the migration.
  

#### Changed

- The rule resolves the route → FormRequest mapping and the public/internal verdict
  statically from the route files, replacing the external JSON manifest and its generator.
- `INTERNAL_MIDDLEWARE` accepts both middleware FQCNs (matched as `Foo::class`) and string
  aliases (matched as `'auth'`); a token not listed is treated public.
- Correlation is same-call-site: a payload is rewritten only where the verb call names its
  route directly (`$this->postJson(route('orders.store'), ['id' => …])`).
- Assertion arrays (`assertJson([...])`) are out of scope — their keys are response/resource
  keys, not the request's FormRequest constants.

`NamedArgumentFromManifestRector` and `ManifestCacheMetaExtension` are unchanged.

#### Notes

- Scope the rule's Rector paths to your test suite — it matches a test idiom whose shape can
  also appear in application code.
- Two boundary caveats are documented in the README and `UPGRADING.md`: a middleware-group
  expansion that injects the auth boundary is not statically visible, and a string action
  inside a `Route::controller(...)->group(...)` block is left untouched.

## 0.14.0 - 2026-06-20

Retargets the opt-in `TestFieldStringToConstantRector` (added in 0.13.0) to its
correct shape, from production adoption feedback: constants come from the
endpoint's **FormRequest**, not the model, and the rewrite is **bidirectional**,
keyed on the endpoint. The rule is still not in any set and a no-op until
configured.

### Changed

- **`TestFieldStringToConstantRector` is now bidirectional and FormRequest-targeted.**
  The safe move is asymmetric by endpoint, so the rule applies whichever direction a
  per-site manifest record names:
  
  - `to_const` (internal endpoint) — a string-literal array key becomes the
    FormRequest constant (`['id' => …]` → `[StoreOrderRequest::ID => …]`), keeping the
    test rename-safe.
  - `to_literal` (public endpoint) — a constant key is inlined back to its literal
    string (`[StoreOrderRequest::ID => …]` → `['id' => …]`), preserving the wire
    contract that a public API's field name *is*.
  
  As before, the rule does no resolution of its own — it visits `Array_` and rewrites
  only an `ArrayItem` key (value-position nodes stay untouchable), applying a manifest
  a consumer-side producer produced. Each direction drift-guards on the token
  currently in source: the literal for `to_const`, the constant for `to_literal`.
  
- **Manifest schema gained a required `operation` field** (`to_const` | `to_literal`),
  and `constFqcn` now appears on both directions — the target to write for `to_const`,
  the constant to match for `to_literal`. A record missing or misnaming `operation`,
  or carrying a malformed `constFqcn`, is dropped at load. Consumers who built a
  0.13.0-format manifest must regenerate it against the new record format, which the
  README documents in full. Generating the manifest needs the live route table
  (route → FormRequest) plus a test-file scan, so the producer is an application-side
  step (a booted artisan command), not a static analyser.
  

### Internal

- Strip-direction fixtures (constant key → literal, plus a strip drift guard)
  alongside the existing convert and skip cases; `ConfigureManifestTest` now covers
  `operation` validation.
- Documented two manifest-contract boundaries on the rule: it is target-class-agnostic
  (it trusts the producer's FormRequest sourcing rather than verifying it), and
  `to_literal` trusts a freshly generated manifest for the resolved literal value —
  the same-tree assumption `NamedArgumentFromManifestRector` already carries.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.13.0...0.14.0

## 0.13.0 - 2026-06-19

### Added

- **`TestFieldStringToConstantRector` (opt-in, not in any set).** Replaces a
  hard-coded field-name string in a test — a request-payload or assertion array
  key such as `['id' => $order->id]` — with the matching model class constant
  (`[Order::ID => $order->id]`). The rule does **no resolution of its own**: like
  `NamedArgumentFromManifestRector`, it applies a manifest a consumer-side PHPStan
  pass computes, rewriting only the sites that pass proved safe.
  
  The safety model is deliberate, because the risk is asymmetric — in an
  *internal* endpoint test a literal field name is a refactor hazard, but in a
  *public API* test that same literal **is the wire contract**, and swapping it
  for a constant would let a value-rename pass the test while breaking the API.
  So the rule rewrites a string **only in array-key position**: it visits `Array_`
  and touches only `ArrayItem::$key`, which makes a literal in value position
  structurally untouchable rather than relying on the producer to never emit it.
  Site identity is `file + line + value`, where `value` doubles as a drift guard;
  an unproven, ambiguous, or public site is simply absent from the manifest and
  left as a string (default-safe). Malformed targets — a `constFqcn` that is not a
  `Class::CONST` pair, an illegal identifier, the magic `::class`, or a bare
  `self`/`static`/`parent` — are dropped at load, never applied.
  
  It is a no-op until configured with a manifest path; a producer ships in
  [`hihaho/phpstan-rules`](https://github.com/hihaho/phpstan-rules)
  (`test-const-manifest.neon`), or write your own to the documented schema. See
  the README for the manifest format and wiring.
  

### Fixed

- **`ManifestCacheMetaExtension` now tracks every manifest from a single
  instance.** A cache-meta extension is keyed by one identifier, and the
  documented `singleton(...)` wiring registers only one instance — so enabling two
  manifest-driven rules (now possible with the rule above) previously left one
  manifest invisible to Rector's cache, risking stale or skipped rewrites. The
  constructor is now variadic (`new ManifestCacheMetaExtension($manifestA, $manifestB)`, backward-compatible with the single-path call): one instance folds
  every manifest's hash together, order-independently, so changing any of them
  reprocesses. Constructing it with no paths now throws rather than silently
  hashing to a constant and disabling cache invalidation.

### Internal

- Fixtures covering the convert (payload key, assertion key, realistic
  multi-field payload), absent-site, drift, and value-position-skip cases, plus a
  `ConfigureManifestTest` exercising every manifest-validation branch.
- Regression tests for the multi-manifest cache extension (combined hashing,
  order-independence, fail-loud on empty construction).

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.12.1...0.13.0

## 0.12.1 - 2026-06-15

A patch release sourced from production dogfood: a usability fix to the
`exclude_calls` knob added in 0.12.0, plus documentation that clarifies how to
name flag arguments on receivers Rector cannot resolve on its own.

### Fixed

- **`RemoveDefaultValuedArgumentRector` — `exclude_calls` now matches the called
  class, not only the declaring class.** A call is opted out when the configured
  class is-a the call's *declaring* class **or** its *called* class. Previously
  only the declaring class matched, so excluding an inherited factory by the
  subclass actually invoked — e.g. `ThrottleRequestsWithRedis::with()` where
  `with()` is declared on `ThrottleRequests` — silently did nothing. Configuring
  either the base class or the subclass now opts the call out. `self`, `static`,
  and `parent` receivers resolve correctly as well.

### Documentation

- **Clarified how to name flags on receivers Rector can't resolve.** The
  `NamedArgumentFromManifestRector` section now distinguishes three cases with a
  decision table: a native docblock `@property` receiver is already resolved (no
  extra wiring); an extension-only dynamic property — one whose type is supplied
  only by a PHPStan `PropertiesClassReflectionExtension`, such as a larastan
  attribute or a container accessor — can be resolved in-engine by loading that
  extension into Rector with `->withPHPStanConfigs([...])`; and a runtime macro,
  which static analysis can't see at all, still needs the manifest bridge. The
  previous wording incorrectly stated Rector could not load such extensions.

### Internal

- Extracted the `exclude_calls` matching into a dedicated `ExcludedCallMatcher`.
- Added a committed proof that `FirstPartyFlagArgumentToNamedRector` names a flag
  on an extension-supplied receiver once the extension is loaded via
  `phpstanConfig()`, and a single-argument fixture for the manifest rule.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.12.0...0.12.1

## 0.12.0 - 2026-06-15

`RemoveDefaultValuedArgumentRector` gains an opt-out for calls whose return value is
serialized in an argument-count-sensitive way.

### Added

- **`RemoveDefaultValuedArgumentRector` accepts an `exclude_calls` config.** Some
  methods serialize their return value in a way that depends on the argument *count* —
  the canonical case is a middleware factory whose result is stringified into a route
  signature:
  
  ```php
  ThrottleRequests::with(60, 1);   // serialized as "throttle:60,1"
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  ```
  Dropping the all-default `1` (or `60, 1`) there is value-equivalent but changes the
  serialized string, and the parser can't see that coupling. `exclude_calls` lets a
  consumer opt specific calls out:
  
  ```php
  ->withConfiguredRule(RemoveDefaultValuedArgumentRector::class, [
      RemoveDefaultValuedArgumentRector::EXCLUDE_CALLS => [
          \Illuminate\Routing\Middleware\ThrottleRequests::class => ['with'],
      ],
  ])
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  ```
  It's keyed by class FQN → method names, matched against the resolved method's
  declaring class **and its subclasses** (so excluding a base covers
  `ThrottleRequestsWithRedis::with` too); method names match case-insensitively. Off by
  default — it's a finer-grained alternative to a per-file `withSkip`.
  
  Note: a call that *overrides* an earlier argument is already protected by 0.11.2's
  preceding-default guard (`with(30, 1)` is left untouched without any config). This
  knob is for the all-default case (`with(60, 1)`) that the guard can't reach.
  

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.11.2...0.12.0

## 0.11.2 - 2026-06-15

A readability fix for `RemoveDefaultValuedArgumentRector`, from real-world adoption
feedback.

### Fixed

- **`RemoveDefaultValuedArgumentRector` no longer strands an overridden argument's
  operand.** It used to drop a trailing default whose value equalled its parameter
  default even when an *earlier* optional positional argument was overridden — leaving
  that override dangling. The canonical case is Eloquent's
  `has($relation, $operator, $count)`:
  
  ```diff
  -$query->has('posts', '=', 1);   // 0.11.1 dropped the 1 →
  +$query->has('posts', '=');      // ...leaving the comparison operator without its operand
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  ```
  A positional default is now droppable only when **no earlier optional positional
  argument was overridden** (passed a non-default value). So `has('posts', '=', 1)` is
  left untouched (the `'='` overrides the `'>='` default, so the `1` is its operand),
  while `has('posts', '>=', 1)` — where every optional argument is at its default —
  still collapses to `has('posts')`. Required arguments never count as overrides, and
  the named-argument path is unaffected (named arguments are self-labelling and never
  dangle). The guard applies to both the default and `cascade_drop` paths.
  
  Consumers carrying a per-file `withSkip` for this case can remove it.
  

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.11.1...0.11.2

## 0.11.1 - 2026-06-14

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

### Added

- **`NativeFunctionFlagArgumentToNamedRector`** (`CodeQuality` set) — names the opaque trailing bool/null flag argument of well-known native functions, so `in_array($needle, $haystack, true)` becomes `in_array($needle, $haystack, strict: true)`. Ships a curated default map (`in_array`/`array_search` → `strict`, `json_decode` → `associative`) that consumers extend or override via `function_flag_arguments`.
- **`FirstPartyFlagArgumentToNamedRector`** (`CodeQuality` set) — names an opaque trailing bool/null flag argument on a first-party method or static call, resolving the parameter name by reflection. Gated to your own namespaces via `first_party_namespaces` (default `App\`), so vendor signatures — whose parameter names can change under semver — are never touched.

Both fire only on a bare `true`/`false`/`null` literal in the final argument position (which keeps the call valid — a positional argument after a named one is a fatal), and skip already-named, unpacked, variadic-target, and unresolvable calls. Both are enabled by default in the `CodeQuality` set.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.2.1...0.3.0

## 0.2.1 - 2026-06-08

A performance pass over the whole rule set and an output-formatting refinement for the nested eager-loading rule. No new rules, no configuration changes, and no change to which code the rules rewrite.

### Changed

- **`NestedArrayEagerLoadingRector`** now prints a grouped array across multiple lines — one item per line with a trailing comma — once it holds more than one item, instead of collapsing the result onto a single line. Single-item arrays stay inline, and any pre-existing array the rule does not rewrite keeps its original formatting. This matches the shape already shown in the rule's documentation and `CodeSample`.

### Performance

- The per-node work every rule does on each visited node was reduced substantially, with no change in behaviour. The hottest gates now match node types and method names directly instead of routing through the generic name resolver, the cheapest and most-selective checks run before file-path and reflection checks, the routing context resolves a class name once instead of twice, and the database-assertion rule memoizes its per-class test-context check. Across a representative corpus this cut per-node rule execution time by roughly 70%.

**Full Changelog**: https://github.com/hihaho/rector-rules/compare/0.2.0...0.2.1

## 0.2.0 - 2026-06-08

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
