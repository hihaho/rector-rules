# Rename propagation and file naming for `AbstractAddSuffixRector`

## Overview

`AbstractAddSuffixRector` renames a class declaration and stops there. It does not
register the rename with Rector's rename collector, so **no reference anywhere is
updated**, and it does not rename the file, so the class stops matching its PSR-4
path. Every consumer that runs `AddNotificationSuffixRector`,
`AddCommandSuffixRector`, `AddMailSuffixRector` or `AddResourceSuffixRector` on an
autoloaded directory gets a tree that no longer autoloads.

Reported from a consuming application. A single Rector run renamed a batch of
notification and command classes. The notifications produced a wave of `class.notFound`
errors. The commands produced **zero** errors and silently disappeared from
`php artisan list` — the more dangerous of the two failure modes, because nothing in a
quality gate reports it.

**Two distinct defects, one shared cause:**

- **No reference propagation.** `refactor()` mutates `$node->name` and returns the
  node. It never calls `RenamedClassesDataCollector::addOldToNewClasses()`, which is
  the mechanism `RenameClassRector` uses (`rules/Renaming/Rector/Name/RenameClassRector.php:113`)
  to make `ClassRenamingPostRector` rewrite imports, `new`, `::class`, type hints
  and docblocks. **This is fixable inside the rule.**
- **No file rename.** Rector 2.6 has **no file-move API at all** — `MovedFileWithNodes`,
  `AddedFileWithNodes` and `RemovedAndAddedFilesCollector` are absent from
  `vendor/rector/rector` (verified by grep across the whole package). A rule
  physically cannot move its own file. **This needs a policy decision, not a code
  fix** — see §2.

## Assumptions

<!-- Sign-off ledger. Everything here is an AI reading of the evidence; none of it was confirmed with a maintainer. -->

- **The collector fix is the right propagation mechanism** (AI inference, high
  confidence). It is the documented path, it is what `RenameClassRector` uses, and
  the probe in §1.3 proves the post-rector does the rewriting once the map is
  populated. Alternative (having the rule rewrite references itself) is strictly
  worse — it would duplicate `ClassRenamer`.
  **⚠ Partly disproven — see R2.** The *post-rector* rewrites nothing but stale
  imports; `RenameClassRector::refactor()` does the reference rewriting, reading
  the map live. Populating the collector only works when `RenameClassRector` runs
  in the same configuration.
- **The rename→file-name mismatch cannot be solved inside Rector 2.6** (verified by
  absence, see §1.4). If a maintainer knows of a supported hook this spec missed,
  §2 option (a) collapses into a real fix and the rest of the decision is moot.
- **The ordering hazard in §3 is unverified** (NEEDS-CONFIRMATION). It follows from
  how `PostFileProcessor` applies post-rectors per file, but it was **not**
  reproduced — the current rule never populates the collector, so there is nothing
  to order. It must be tested as part of the fix, not assumed.
- ~~**All four concrete rules are affected identically** (verified — they differ only
  in `baseClass()` and `suffix()`; the defect is entirely in the shared abstract).~~
  **✗ Disproven — see R3.** `AddResourceSuffixRector` extends `AbstractRector`
  directly and carries its own `refactor()`; only three rules share the abstract.
- **Scope is this package only.** Breakages traced to other Rector extensions in the
  same run are out of scope.

---

## 1. Current State

### 1.1 The rule

`src/Rector/NamingClasses/AbstractAddSuffixRector.php`:

```php
public function refactor(Node $node): ?Node
{
    // … abstract / already-suffixed / not-a-subclass guards …

    $newName = $this->buildNewName($className);
    $node->name = new Identifier($newName);

    return $node;
}
```

`$node->name` is the `Class_` node's own `Identifier`. Nothing else in the class —
or in `Concerns/ChecksClassHierarchy` — touches references or the filesystem.

### 1.2 Isolated reproduction

Run on a git worktree of the consumer at a clean commit, with a config containing
**only** the one rule, so nothing else can be blamed:

```php
return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/app/Notifications',
        __DIR__ . '/app/Actions',
        __DIR__ . '/tests/Feature',
    ])
    ->withRules([AddNotificationSuffixRector::class]);
```

Result — 12 files changed, all of them declarations:

| Location | Before | After |
|---|---|---|
| `app/Notifications/OrderShipped.php:14` | `final class OrderShipped` | `final class OrderShippedNotification` |
| filename | `OrderShipped.php` | `OrderShipped.php` (**unchanged**) |
| `app/Actions/ShipOrder.php:17` | `use App\Notifications\OrderShipped;` | **unchanged** |
| `app/Actions/ShipOrder.php:180` | `new OrderShipped($order)` | **unchanged** |
| `tests/…/OrderShippingTest.php:331` | `OrderShipped::class` | **unchanged** |

So the rule leaves behind a class that (a) cannot be autoloaded from its path and
(b) is referenced everywhere under a name that no longer exists.

### 1.3 The collector mechanism does work

Same worktree, same paths, `RenameClassRector` configured with the map the rule
should have registered:

```php
->withConfiguredRule(RenameClassRector::class, [
    'App\Notifications\OrderShipped' => 'App\Notifications\OrderShippedNotification',
])
```

2 files changed — the caller and the test:

```php
- $customer->notify(new OrderShipped($order));
+ $customer->notify(new \App\Notifications\OrderShippedNotification($order));

- Notification::assertSentTo($customer, OrderShipped::class);
+ Notification::assertSentTo($customer, \App\Notifications\OrderShippedNotification::class);
```

Two things to carry into the fix:

- Reference rewriting is entirely the post-rector's job once the map is populated.
  Confirmed end to end.
- It emits a **fully-qualified name and leaves the now-unused `use` import in
  place**. In a consumer whose config enables `withImportNames()` this gets tidied
  into an import; in one that does not, the output is ugly but correct. A fixture
  should pin whichever behaviour the package wants, rather than discovering it later.
- In this run `RenameClassRector` did **not** rename the declaration itself
  (declaration stayed `OrderShipped`). The two rules are therefore
  complementary, not overlapping: the suffix rule owns the declaration, the
  collector owns the references.

### 1.4 Rector 2.6 has no file-move API

```
$ grep -rln "MovedFileWithNodes\|AddedFileWithNodes\|RemovedAndAddedFilesCollector" vendor/rector/rector/
(no matches)
$ grep -rln "class RenameFile\|movedFile\|MovedFile" vendor/rector/
(no matches)
```

The `FileSystemRector` namespace is gone from Rector 2.x. There is no supported way
for a rule to rename the file it is editing.

### 1.5 Impact

Two distinct failure shapes, reproduced against a synthetic corpus:

| Shape | Symptom |
|---|---|
| Reference to a renamed class | `class.notFound`, plus cascades where the value degrades to `mixed` |
| Class discovered by path, not by reference | **Silent.** No static error at all |

The command rules were worse. `app/Console/Commands/ImportArticles.php` now
declares `ImportArticlesCommand`; Laravel derives the FQCN from the path during
console discovery, finds no `App\Console\Commands\ImportArticles`, and skips it.
`php artisan list` exits 0 and simply no longer lists the command. **Zero static
errors, silent functional loss.** Same shape applies to any consumer that discovers
classes by path (Livewire components, Filament resources, auto-registered
listeners).

---

## 2. Proposed Approach

**Part 1 — propagate references (do this regardless of the Part 2 decision).**

Inject the collector into `AbstractAddSuffixRector` and register the rename:

```php
public function __construct(
    protected readonly ReflectionProvider $reflectionProvider,
    private readonly RenamedClassesDataCollector $renamedClassesDataCollector,
) {}

public function refactor(Node $node): ?Node
{
    // … existing guards …

    $oldFqcn = (string) $node->namespacedName;   // NOT $node->name — needs the FQCN
    $newName = $this->buildNewName($className);

    $node->name = new Identifier($newName);

    $this->renamedClassesDataCollector->addOldToNewClasses([
        $oldFqcn => Strings::before($oldFqcn, '\\', -1) . '\\' . $newName,
    ]);

    return $node;
}
```

`$node->namespacedName` is populated by `NameResolver`, which Rector runs. Guard for
the case where it is null (a class in no namespace) rather than assuming it.

**Part 2 — the file name. A maintainer decision, three honest options:**

| Option | Behaviour | Cost |
|---|---|---|
| **(a) Propagate, document the file rename** | Rule renames declaration + references; the file keeps its old name and the consumer must `git mv` afterwards. | Every run leaves an autoload-broken tree until a human or a script finishes the job. Needs a loud README warning and ideally a companion `bin/` script. Weakest option, but honest. |
| **(b) Skip when the basename matches the old class name** | Rule refuses to rename when renaming would break PSR-4 — i.e. it declines in exactly the autoloaded directories these classes live in. | Effectively disables all four rules for real projects. Say that plainly rather than shipping a rule that looks active and never fires. |
| **(c) Demote to a reporting rule** | Rule reports the violation and rewrites nothing; the rename stays a human two-step (`git mv` + rename class), which tooling like an IDE refactor does correctly. | Loses automation, keeps the convention enforceable in CI. Probably the most defensible for a suffix-naming convention. |

~~Recommendation: **(c)**, with **(a)**'s collector fix implemented anyway so that
whoever chooses (a) later has the propagation already proven. (b) is documented for
completeness but ships a no-op.~~

**✗ Superseded — there is a fourth option that actually works. See R8, which
demonstrates it end to end against a real corpus.**

| Option | Behaviour | Cost |
|---|---|---|
| **(d) Pre-scan + full rename** | Rule scans every configured path *once at container-build time*, registers the complete old→new map before the first file is traversed, and renames the declaration, every reference, and the file. | A whole-corpus parse per worker process at boot. Everything else is correct: order-independent, parallel-safe, dry-run-safe, idempotent. |

Recommendation: **(d)**.

---

## 3. Test Design

Fixtures live in `tests/Rector/NamingClasses/AddNotificationSuffixRector/Fixture/`
alongside the existing `missing_suffix.php.inc`, `skip_abstract.php.inc`,
`skip_already_suffixed.php.inc`, `skip_unrelated_class.php.inc`.

Required new coverage:

- **Reference in the same file** — a declaration plus a `::class` reference below it,
  both rewritten.
- **Reference in another file** — the shape the defect is actually about. ~~Needs a
  multi-file fixture (see `tests/Rector/Routing/NormalizeRoutePathRector/Fixture/routes/`
  for the package's existing multi-file precedent).~~ **✗ No such precedent and no
  such harness — see R4.** `doTestFile()` processes exactly one path; the `routes/`
  directory is nine independent single-file fixtures. This needs a bespoke test
  calling `ApplicationFileProcessor::processFiles()` with two paths.
- **⚠ Ordering — declaration processed *after* the caller.** `RenameClassRector`
  populates its map at `configure()` time, before any file is processed. A
  collector populated *during* processing is only visible to files processed later,
  so a caller that sorts before the declaration may keep the stale name in the same
  run — and Rector's result cache may then skip it on the next run, leaving a
  permanently broken tree that a second `rector` invocation does not fix.
  **This is NEEDS-CONFIRMATION: it was not reproduced, because the rule currently
  registers nothing.** Write the fixture so the caller sorts first (e.g.
  `AaaCaller.php` + `ZzzNotification.php`) and find out. If it reproduces, the fix
  is a second pass or a `configure()`-time pre-scan, and option (c) becomes
  substantially more attractive.
- **Import handling** — pin whether output is a FQCN with a stale `use`, or a
  rewritten import, under the package's own `configured_rule.php` (which does not
  enable `withImportNames()`).
- **The three sibling rules** — `AddCommandSuffixRector`, `AddMailSuffixRector`,
  `AddResourceSuffixRector` each get one reference-propagation fixture, since the
  fix lands in the shared abstract.

## Edge Cases

| Scenario | Handling |
|---|---|
| Class referenced from another file | Rewritten via the collector (§2 Part 1) |
| Class referenced only in a docblock | `ClassRenamingPostRector` covers docblocks — needs a fixture to prove it |
| Caller file processed before the declaration | **NEEDS-CONFIRMATION** — see §3; may keep the stale name |
| Class in the global namespace (`$node->namespacedName` null) | Guard and skip rather than build a broken FQCN |
| File basename already differs from the class name | No PSR-4 regression from the rename; propagation alone is sufficient |
| Class discovered by path, not by reference (Artisan command, Livewire component) | **Silently disappears.** No reference to rewrite, so Part 1 does not help — only Part 2 does |
| Two classes in one file, one renamed | Collector keys on FQCN, so unaffected; worth a fixture |
| Consumer runs with `--dry-run` in CI | Reports the rename as a diff; the broken end state is invisible until applied |

---

## Implementation

Phases rewritten for **option (d)** (R8). The original phases assumed a
mid-traversal collector fix and a policy choice between (a)/(b)/(c); both are
superseded.

### Phase 1: Failing multi-file test (Priority: HIGH — gates everything)

- [x] Bespoke integration test driving `ApplicationFileProcessor::processFiles()`
  with **two** paths (declaration + caller), reaching the container via `make()`.
  Not a `.php.inc` fixture — that harness is single-file (R4/R9).
- [x] Caller sorts **before** the declaration, so the test pins the ordering hazard.
- [x] Confirm it fails today: caller keeps the stale name.

### Phase 2: Pre-scan map service (Priority: HIGH)

- [x] `Rector/NamingClasses/Support/SuffixRenameMap` — memoised, reads
  `Option::PATHS` via `SimpleParameterProvider`, parses with PHP-Parser +
  `NameResolver`, builds `[$oldFqcn => $newFqcn]`. Model on
  `Rector/Testing/Support/RouteRequestResolver`. Internal, not public API.
- [x] Registers the map into `RenamedClassesDataCollector` at construction, i.e.
  before the first file is traversed.
- [x] Guard: skip anonymous classes (`namespacedName` null — R9), classes whose
  destination FQCN already exists, and two sources converging on one destination.
- [x] Inject into `AbstractAddSuffixRector` **and** `AddResourceSuffixRector`
  separately (R3).

### Phase 3: Reference rewriting (Priority: HIGH)

- [x] Rewrite references from the rule via the public
  `ClassRenamer::renameNode($node, $map, $scope)` so consumers do not have to
  register `RenameClassRector` themselves.
- [x] Phase 1 test goes green, sequentially and under `withParallel()`.
- [x] Cover docblock references and the no-`withImportNames()` output shape.

### Phase 4: File rename (Priority: HIGH)

- [x] Record `(filePath, oldShort, newShort)` in `refactor()` from
  `$this->getFile()->getFilePath()`.
- [x] `register_shutdown_function` rename, guarded on: basename equals the old
  short name; the file on disk already contains `class <newShort>` (this is what
  makes `--dry-run` a no-op); destination does not exist; the renamed class is the
  only class in the file.
- [x] Test: dry-run leaves the filename alone; real run renames it; a second run
  reports 0 changes.

### Phase 5: Performance (Priority: MEDIUM)

- [x] Benchmark the pre-scan (one full-corpus parse per worker at boot) through the
  `autoresearch` loop against a synthetic corpus, per the performance guideline.
  Capture a baseline first.

### Phase 6: Docs and release (Priority: MEDIUM)

- [x] `README.md`: document that these rules rename the file, and that
  `withImportNames(removeUnusedImports: true)` produces clean output while omitting
  it leaves FQCN references plus a stale `use`.
- [x] Release notes draft in `internal/release-notes-<version>.md` — **not**
  `CHANGELOG.md`, which is CI-managed (R9).
- [x] These rules now move files. That is a behaviour change for anyone running
  `HihahoSetList::ALL` and must be called out as such.

## Open Questions

- **Q1.** Does the dynamically-populated collector reach files processed earlier in
  the same run? (§3, blocks Phase 2 sign-off.)
  → **Answered: no.** See R5 (per-file loop, name-sorted, plus per-worker
  collector under the default parallel run).
- **Q2.** Does Rector's result cache persist a half-renamed tree across runs — i.e.
  is a second `rector` invocation able to finish the job?
  → **Answered: no, and the cache is not even the main reason.** See R6 — the
  rule's own already-suffixed guard prevents the map ever being repopulated.
- **Q3.** Is there any file-rename hook in Rector 2.6 this spec missed? §1.4 is an
  argument from absence.
  → **Re-checked against 2.6.2: none found.** See R1. Still an argument from
  absence, but the absence is total.
- **Q4.** Should `AddCommandSuffixRector` be dropped outright? Artisan commands are
  path-discovered, so it has no safe automated form under any §2 option.
  → **Still a maintainer call**, but R7 confirms the premise: Part 1 cannot help
  it by construction.
- **Q5 (new).** Should `config/sets/naming.php` register `RenameClassRector`
  alongside these rules if option (a) is ever chosen? Without it the collector map
  is read by nobody (R2). That is a set-contract change.
  → **Resolved: no set change needed.** `RelatedConfigInterface` imports the rule's
  own config file, so the coupling travels with the rule. See R10.

## Findings

<!-- Filled in during implementation. -->

- Evidence for §1.2 and §1.3 was gathered in a throwaway git worktree of the
  consumer with `vendor` symlinked, so the consumer's own tree was never the
  experiment. Reproducing here needs only the package's fixture harness.
- Rector's result cache made the first `RenameClassRector` probe report 0 changes;
  `--clear-cache` was required. Worth remembering when a fixture behaves oddly.

---

### Research pass — code trace against `rector/rector` 2.6.2 (installed version)

All claims below traced in `vendor/rector/rector`; none reproduced at runtime
unless stated. Line references are to the installed (prefixed) build.

#### R1. Confirmed as written

- **§1.1** — `AbstractAddSuffixRector::refactor()` mutates `$node->name` and
  returns; no collector, no filesystem
  (`src/Rector/NamingClasses/AbstractAddSuffixRector.php:57-60`).
- **§1.4 — no file-move API.** `MovedFileWithNodes`, `AddedFileWithNodes`,
  `RemovedAndAddedFilesCollector`, `FileSystemRector` all return **zero** matches
  across `vendor/rector/rector`. Q3 stands: an argument from absence, but the
  absence is total.
- **`RenameClassRector.php:113`** — the cited `addOldToNewClasses()` call exists
  at exactly that line, inside `configure()`.

#### R2. ✗ §2's propagation mechanism is wrong — the post-rector does not rewrite references

The spec says the collector makes `ClassRenamingPostRector` "rewrite imports,
`new`, `::class`, type hints and docblocks". It does not. In 2.6.2
`ClassRenamingPostRector::enterNode()` handles only `FileNode`, calls
`removeImports()` for renames already applied, and returns `STOP_TRAVERSAL` for
everything else (`src/PostRector/Rector/ClassRenamingPostRector.php:38-53`). Its
job is **stale-import cleanup only**.

The only consumers of the map are:

| Consumer | Role |
|---|---|
| `rules/Renaming/Rector/Name/RenameClassRector.php:96` | reads `getOldToNewClasses()` **at refactor time** and does all reference rewriting via `ClassRenamer` |
| `src/PostRector/Rector/ClassRenamingPostRector.php:58` | removes now-stale `use` imports |
| `src/NodeTypeResolver/NodeTypeResolver.php:466` | `matchClassName()` — type resolution sees the new name |

Consequence: **Part 1 in isolation is a no-op.** Injecting the collector into
`AbstractAddSuffixRector` populates a map nobody reads unless
`RenameClassRector` is *also* registered in the same run (unconfigured is fine —
it reads the map live, so an empty initial map is harmless). The §1.3 probe could
not distinguish this, because it had `RenameClassRector` registered.

This has two follow-on effects the spec must absorb:

- The Phase 2 change is **two** changes: register the rename *and* ship
  `RenameClassRector` alongside these rules in `config/sets/naming.php` (or
  document that consumers must add it). Adding a third-party rule to a set is a
  set-contract change per the public-API rules.
- The planned same-file fixture will **fail** under the existing
  `config/configured_rule.php`, which registers only the suffix rule.

#### R3. ✗ "All four rules affected identically" is false

`AddResourceSuffixRector` extends `AbstractRector` directly, not
`AbstractAddSuffixRector` — it has its own `refactor()` plus
`refactorResourceCollection()` / `refactorJsonResource()`
(`src/Rector/NamingClasses/AddResourceSuffixRector.php:23`, `:88`). Only
`AddCommandSuffixRector`, `AddMailSuffixRector` and `AddNotificationSuffixRector`
extend the abstract. A fix in the shared abstract covers three of four; the
resource rule needs the same change applied separately.

#### R4. ✗ There is no multi-file fixture harness — Phase 1's failing test is not expressible

`AbstractRectorTestCase::doTestFile()` writes one temp file and calls
`ApplicationFileProcessor::processFiles([$filePath])` — a single path
(`src/Testing/PHPUnit/AbstractRectorTestCase.php:126`, `:207-222`). The
`$includeFixtureDirectoryAsSource` flag only feeds the directory to
`DynamicSourceLocatorProvider` for **type resolution**; those files are never
processed or rewritten.

The cited precedent is a misreading: `tests/Rector/Routing/NormalizeRoutePathRector/Fixture/routes/`
is an ordinary subdirectory of nine independent single-file fixtures, not a
multi-file case.

So cross-file propagation cannot be pinned by a `.php.inc` fixture. It needs a
hand-written test that drives `ApplicationFileProcessor::processFiles()` with two
paths and asserts on both — no such test exists in this package today. Budget
Phase 1 accordingly.

#### R5. Q1 — ordering hazard is **real** (confirmed by code trace, not reproduced)

`FileProcessor::processFile()` runs, per file, a `do { rules → post-rectors →
print } while (changed)` loop and then moves on
(`src/Application/FileProcessor.php:99-118`). `ApplicationFileProcessor::processFiles()`
is a flat `foreach` over the path list (`:159-165`), and `FilesFinder` sorts by
name (`src/FileSystem/FilesFinder.php:132-133`).

A map entry registered while processing file *N* is therefore invisible to files
*1…N-1*. Any caller sorting before its declaration keeps the stale name. The
spec's own §1.2 case is exactly that shape: `app/Actions/…` sorts before
`app/Notifications/…`, so even with Part 1 fully implemented **that reproduction
would still leave the caller broken**.

The per-file `do-while` does rescue the *same-file* case: iteration 1 renames the
declaration and populates the map, iteration 2 lets `RenameClassRector` rewrite
references below it.

Two further amplifiers:

- **Parallel runs — on by default.** Rector's own base config calls
  `$rectorConfig->parallel()` (`config/config.php:13`, imported at
  `src/DependencyInjection/LazyContainerFactory.php:249`), so `Option::PARALLEL` is
  `true` unless the consumer calls `withoutParallel()`. Work is chunked at
  `jobSize` 16 across worker processes and the collector is per-process, so a
  dynamically registered rename **cannot cross a chunk boundary at all**. For a
  default-configured consumer this is the dominant failure mode, ahead of the
  sort-order hazard — cross-file propagation would work only for callers that
  happen to land in the same chunk, after the declaration.
- **Test-harness state leak.** Resettables are reset once per
  `sha1($configFile . static::class)`, not per fixture
  (`AbstractRectorTestCase.php:66-84`), so a rename registered by fixture 1 stays
  in the collector for every later fixture in the same test class. Fixtures must
  not reuse class names across files.

#### R6. Q2 — a second run **cannot** finish the job, and the cache is the lesser reason

The primary blocker is the rule's own guard: after run 1 the declaration already
ends in the suffix, so `str_ends_with($className, $this->suffix())` bails
(`AbstractAddSuffixRector.php:49-51`) and the map is never repopulated. `--clear-cache`
does not help.

The cache is a second, independent blocker: `ChangedFilesDetector` keys purely on
per-file content hash with no dependency graph
(`src/Caching/Detector/ChangedFilesDetector.php:60-71`), so an unrewritten caller
— unchanged in run 1 — is filtered out of run 2 by `UnchangedFilesFilter`.

Net: the half-renamed tree is **not self-healing**. This is the strongest argument
in the document for §2 option (c).

#### R7. Q4 — `AddCommandSuffixRector`

Nothing in the trace contradicts §1.5. Artisan discovers commands by path→FQCN,
so no reference exists to rewrite and Part 1 cannot help by construction. Under
(a) or (b) the rule has no safe automated form; under (c) it is fine.

#### Effect on the recommendation

Every finding pushes the same way. Option (a) now costs: collector injection in
two places + a third-party rule added to the set + an order-dependent result that
silently half-applies + a state that no rerun repairs. Option (c) — report only —
is unaffected by R2, R4, R5 and R6 entirely. Recommendation **(c)** stands and is
materially stronger than when the spec was written.

If (a) is still wanted later, the propagation is *not* "already proven" as §2
claims — it is proven only for the same-file case, and only with
`RenameClassRector` co-registered.

---

### R8. A working fix exists — option (d), demonstrated end to end

The three options in §2 all assumed the rename map can only be built *during*
traversal. It does not have to be. A rule's **constructor runs at container build,
before the first file is parsed**, so the map can be complete before anything is
traversed. That single change removes every ordering and parallelism hazard at once.

**Shape of the fix** (three parts):

1. **A memoised pre-scan service** — same architecture as the package's existing
   `Rector/Testing/Support/RouteRequestResolver` (lazily built, memoised, parses the
   corpus with PHP-Parser directly). It reads
   `SimpleParameterProvider::provideArrayParameter(Option::PATHS)`, walks every
   `*.php` file, resolves `namespacedName` via `NameResolver`, and registers the
   complete `[$oldFqcn => $newFqcn]` map into `RenamedClassesDataCollector`.
2. **Reference rewriting** — `RenameClassRector` reads the collector live at refactor
   time, so it rewrites every reference. (Self-contained alternative: call the public
   `ClassRenamer::renameNode($node, $map, $scope)`
   — `rules/Renaming/NodeManipulator/ClassRenamer.php:75` — from the rule itself, so
   consumers do not have to register a second rule.)
3. **File rename** — Rector has no file-move API (R1), but a rule can do it itself
   after the run. Record `(filePath, oldShort, newShort)` from
   `$this->getFile()->getFilePath()` during `refactor()`, then in a
   `register_shutdown_function` rename the file, guarded on:
   - basename equals the *old* short class name (otherwise no PSR-4 rename is due);
   - the file **on disk** already contains `class <newShort>` — this is what makes
     `--dry-run` a no-op, since nothing was written;
   - destination does not already exist.

**Verification — prototype run against a 43-file synthetic corpus** with the caller
(`app/Actions/ShipOrder.php`) deliberately sorting *before* the declaration
(`app/Notifications/OrderShipped.php`), i.e. exactly the §1.2 failure shape:

| Scenario | Result |
|---|---|
| Sequential (`withoutParallel()`) | ✅ declaration + caller + `::class` all rewritten |
| Parallel (`withParallel(120, 8, 4)`, 43 files, jobSize 4) | ✅ identical result — each worker pre-scans, so every worker holds the full map |
| `--dry-run` | ✅ diff reported, **file not renamed** |
| Real run | ✅ `OrderShipped.php` → `OrderShippedNotification.php` |
| Second run on the fixed tree | ✅ `changed_files: 0, errors: 0` — idempotent |
| With `withImportNames(removeUnusedImports: true)` | ✅ `use App\Notifications\OrderShippedNotification;`, short references, no stale import |
| Without `withImportNames()` | ⚠ FQCN references plus a stale `use` of the old name — ugly, still valid PHP |

The last row is the one behaviour worth documenting for consumers rather than
"fixing": the package cannot force a consumer's import config.

**Why (d) beats (a).** (a) registers the map mid-traversal, so it is order- and
worker-dependent and leaves the file unmoved. (d) registers it before traversal and
moves the file, so the tree autoloads when the run finishes. The path-discovery
failure mode in §1.5 (Artisan commands, Livewire, Filament) is *also* fixed by (d),
because the file name now matches the class — which is precisely what neither (a),
(b) nor (c) could do.

**Still to design before implementing:**

- **Collisions** — destination FQCN already exists, two sources converging on one
  destination, destination filename occupied. The prototype skips on an occupied
  filename; the FQCN cases need a decision (skip and report is the safe default).
- **Multi-class files** — only rename the file when the renamed class is the sole
  class in it and owns the basename.
- **Pre-scan cost** — one full-corpus parse per worker process. Needs a benchmark via
  the `autoresearch` loop before shipping, per the performance guideline.
- `AddResourceSuffixRector` needs the same treatment separately (R3).

### R9. Corrections from the independent (Codex) review

An adversarial second pass over R1–R7 tightened four of them. R1, R3 and R6 held.

- **R2 overstated.** The collector is *not* read only by `RenameClassRector` —
  `NodeTypeResolver:466` consults it for type matching, so injection is not
  literally inert. The accurate claim is narrower: **no AST reference rewriting
  happens unless `RenameClassRector` is registered.**
- **R4 overstated.** "Not expressible" is wrong. `ApplicationFileProcessor::processFiles(array $filePaths, …)`
  is public and loops over every path supplied
  (`src/Application/ApplicationFileProcessor.php:150`), and test subclasses reach the
  container through the protected `make()` on `AbstractLazyTestCase`. Only the
  `.php.inc` *helper* is single-file; a bespoke multi-file integration test is fully
  supported. This is what the Phase 1 test should be.
- **R5 overstated.** Parallel-by-default holds, and the sequential ordering hazard
  holds. But "cannot cross a chunk boundary at all" is wrong: workers stay alive and
  receive successive chunks (`src/Parallel/Application/ParallelFileProcessor.php:156`),
  so a worker retains collector state across the chunks it handles. Cross-**worker**
  propagation is impossible; cross-**chunk** is scheduler-dependent. Under (d) the
  distinction stops mattering — every worker pre-scans.
- **R7 overstated.** "No reference exists" is too absolute — explicit references to a
  command class can exist and would be rewritten. The precise claim: reference
  propagation cannot repair **path-derived discovery**
  (`Illuminate/Foundation/Console/Kernel.php:372`), which is why only (d) saves the
  command rule.

Three further defects it found in the spec, all fixed above or below:

- **Option (c) does not actually enforce anything in CI.** A reporting-only Rector
  rule produces no diff and no error, and `ProcessCommand` exits 0 on an empty
  result. "Keeps the convention enforceable in CI" was false as written — (c) would
  have needed a separate PHPStan rule to mean anything. Another point for (d).
- **`PostFileProcessor` caches post-rector enablement once** (`:105`). If the first
  file in a worker sees an empty collector, stale-import cleanup stays disabled for
  that worker's whole life. A mid-traversal map (option (a)) hits this; a pre-scan
  (option (d)) does not, because the map is populated before any file is processed.
- **The global-namespace edge case is backwards.** `namespacedName` *is* populated
  for a named class in the global namespace — `Name::concat(null, $node->name)`
  returns the second name. It is null for an **anonymous** class. The guard belongs
  there, and the `Strings::before($oldFqcn, '\\', -1)` construction in §2 mishandles a
  class with no namespace regardless.

---

### R10. Implementation notes (option (d), shipped)

**What landed**

| File | Role |
|---|---|
| `src/Rector/NamingClasses/Support/SuffixRenameMap.php` | The pre-scan. Builds the map, decides collisions, schedules and flushes file renames. `@internal`, `ResettableInterface`. |
| `config/related/rename-propagation.php` | Binds `SuffixRenameMap` as a singleton and registers `RenameClassRector`. |
| `src/Rector/NamingClasses/AbstractAddSuffixRector.php` | Pre-scan in the constructor; `refactor()` now asks the map for permission before renaming. |
| `src/Rector/NamingClasses/AddResourceSuffixRector.php` | Same, with its own naming logic extracted to `newShortNameFor()`. |
| `tests/…/RenamePropagation/`, `tests/…/ResourceRenamePropagation/` | Multi-file integration tests driving `ApplicationFileProcessor::processFiles()`. |
| `tests/…/Support/SuffixRenameMapTest.php` | Unit coverage for the file-rename guards, incl. the dry-run shape. |

**`RelatedConfigInterface` is how the coupling is hidden.** Registering a rule that
implements it makes Rector import that rule's config file
(`RectorConfig.php:209`). So `->withRules([AddNotificationSuffixRector::class])`
alone pulls in `RenameClassRector` and the shared singleton. No set-contract change
was needed, which retires **Q5**. Verified end to end against a synthetic corpus with
only the suffix rule in the consumer config.

**Deviations from the plan, and why**

- **A per-file fallback was added** (`SuffixRenameMap::claim()`). The pre-scan reads
  `Option::PATHS`, but Rector's own `config/config.php` calls `paths([])` when the
  container is created, and the `.php.inc` fixture harness supplies its file through
  `Option::SOURCE` instead. Without a fallback every existing single-file fixture
  broke. `claim()` therefore clears a rename the scan never saw, using the cheap
  same-directory collision check that context allows. The pre-scan stays authoritative
  wherever it did run — it is the only thing that can see the whole corpus.
- **`refactor()` now defers to the map.** Originally it renamed unconditionally. It
  cannot, because only the pre-scan knows whether the destination name is taken. The
  Phase 1 test caught this: the current rule happily renamed `ReceiptSent` on top of an
  existing `ReceiptSentNotification`, silently merging two types. That collision bug
  predates this work and was not in the spec.
- **Phase 5 was a direct measurement, not the full `autoresearch` loop.** There was no
  optimisation to iterate on — only a cost to characterise. Script:
  `autoresearch/bench-suffix-rename-map.php`.

**Measured pre-scan cost** (synthetic corpus, per worker process, at container build):

| Files | First rule | Each further rule |
|---|---|---|
| 100 | 39 ms | 1.9 ms |
| 500 | 69 ms | 2.1 ms |
| 2000 | 243 ms | 7.8 ms |

Parsing is memoised per file across rules, so the four suffix rules cost roughly one
scan, not four.

**Two PHPStan ignores were added**, both narrowly scoped by identifier and path in
`phpstan.neon.dist`, because the feature is unbuildable without them:

- `class.implementsInternalInterface` — `RelatedConfigInterface` is tagged `@internal`
  but is Rector's only hook for a rule to pull in its own services.
- `classConstant.internal` — `Option::PATHS` is the only way a rule can learn which
  paths the consumer configured.

**Pre-existing issues found, deliberately left alone** (all outside this spec):

- PHPStan cannot build its container in the current working tree:
  `tomasvotruba/type-coverage` 2.3.0 now bundles type-perfect, which collides with the
  standalone `rector/type-perfect` 2.3.0. This comes from the **uncommitted**
  `composer.json` version bumps already in the tree, not from this change. Verified by
  stashing: it fails identically without any of this work. Dropping
  `rector/type-perfect` from `require-dev` is the likely fix — a dependency decision,
  so left to a maintainer.
- With that collision worked around locally, 4 PHPStan errors remain, all in files this
  change never touched: `src/Caching/ManifestCacheMetaExtension.php` (deprecated
  interface) and three `nullCoalesce.unnecessary` in
  `tests/…/TestFieldStringToConstantRector/RouteRequestResolverTest.php`.

### R11. Fixture pass — a second collision bug

Adding conventional `.php.inc` fixtures alongside the multi-file tests surfaced a bug
the integration tests had missed. `SuffixRenameMap::claim()` — the fallback used when
the pre-scan never saw the file — checked only for a *sibling file* holding the
destination name. A single file declaring both `ReceiptSent` and
`ReceiptSentNotification` therefore passed the guard, and the rule renamed the first
onto the second: **two identically named classes in one file**, a fatal error.

Fixed by having `claim()` also check the classes declared in the file it is renaming
(`SuffixRenameMap::declaresClass()`). Pinned by
`AddNotificationSuffixRector/Fixture/skip_when_destination_name_is_taken.php.inc`.

**Final test layout**

| Coverage | Where |
|---|---|
| Same-file propagation (`new`, `::class`, docblock) | `rewrites_reference_in_same_file.php.inc` in all four rules' `Fixture/` dirs |
| Same-file collision guard | `AddNotificationSuffixRector/Fixture/skip_when_destination_name_is_taken.php.inc` |
| Cross-file propagation, caller processed first | `RenamePropagation/{Notification,Command,Mail,Resource}RenamePropagationTest` |
| File rename, corpus-wide collisions, basename mismatch | same four test classes |
| File-rename guards incl. the dry-run shape | `Support/SuffixRenameMapTest` |

All four rules are proven cross-file, not just the two that were originally covered.
The shared harness lives in `RenamePropagation/AbstractRenamePropagationTestCase`.

### R12. Hardening pass

Three holes found by self-review before shipping, each now covered by a fixture:

- **Collision detection was case-sensitive.** PHP class names are not. A corpus holding
  `RefundissuedNotification` would not have blocked renaming `RefundIssued` onto it —
  a fatal redeclaration. All collision keys now go through `collisionKey()`
  (lowercased). Fixture: `skip_when_destination_differs_only_by_case.php.inc`.
- **Only classes counted as occupying a name.** Interfaces, traits and enums share the
  class namespace, so an `interface ShipmentDispatchedNotification` did not stop
  `ShipmentDispatched` from being renamed onto it. The scan and the `claim()` fallback
  now collect every `ClassLike`. Fixture:
  `skip_when_an_interface_holds_the_destination_name.php.inc`.
- **The dry-run guard grepped file text.** `/\bclass\s+Name\b/` matches the name in a
  comment or a string literal, so a file could have been renamed on the strength of a
  mention rather than a declaration. It now re-parses the file (fresh from disk, no
  memo) and looks for a real class declaration — `declaresShortName()`.

Test totals after this pass: 48 in `tests/Rector/NamingClasses`, 457 across the suite.

### R13. Independent review pass, and what it changed

An adversarial external review of the implementation raised eight findings. Five were
acted on; three are documented limitations.

**Fixed**

- **The pre-scan bypassed `withSkip()`.** The worst finding: a skipped declaration was
  still registered, so `RenameClassRector` rewrote every reference to a class that was
  never renamed — a broken tree from a config that asked for the opposite. The scan now
  consults `Skipper` for both global and rule-scoped skips.
- **`claim()` agreed to any rename, not the one asked for.** Two rules claiming one
  class for different targets would have left the declaration, the references and the
  file move disagreeing. It now compares the requested destination against the stored
  one and refuses a conflicting second claim.
- **A failed file rename was silent.** The tree would be left with a renamed class in
  an unrenamed file and a zero exit code. The rename now refuses up front when the
  directory is not writable, and reports on `STDERR` if `rename()` fails anyway.
- **Spec provenance.** Consumer framework version, class counts, exact error counts and
  an unrelated third-party incident were still in §1. Replaced with a synthetic
  reproduction and a generic impact table.
- The case-insensitivity, class-like and parsed-guard fixes from R12 were confirmed
  sound by the same review.

**Documented rather than fixed**

- **CLI-only paths.** `ConfigurationFactory::resolvePaths()` gives command-line
  arguments priority and never writes them back to `Option::PATHS`, and `Configuration`
  is not container-bound — so a rule genuinely cannot see them at construction time.
  With `withPaths()` absent, the rules degrade to per-file registration: the class, its
  file and later-processed references are still handled, but an earlier-processed
  reference can be missed. This is strictly better than the previous behaviour, and the
  README now tells consumers to configure `withPaths()`.
- **Mixed-case references.** `RenameClassRector` matches FQCNs exactly, so
  `new ORDERSHIPPED()` is not rewritten. Documented.
- **Shutdown-bound renames.** Fine for the CLI, awkward when Rector is embedded as a
  library. `flushFileRenames()` is public so an orchestrator can drive it.

**Test-environment note.** Rector's `SkippedPathsResolver` memoises its paths on first
use and only re-resolves under a PHPUnit runner it recognises. Under Pest an earlier
test class can populate that cache first, and nothing public clears it — so the skip
unit test verifies the skip is live and marks itself skipped if it is not, rather than
failing intermittently.

### R14. CI caught a floor incompatibility the local run could not

The skip guard first used `Skipper::matchSkip()`, which exists in the installed Rector
(2.6.2) but **not** in the `rector/rector` floor this package declares (`^2.4.1`).
Locally green; the `prefer-lowest` CI leg failed with
`Call to undefined method Rector\Skipper\Skipper\Skipper::matchSkip()` — 15 failures.

Switched to `shouldSkipElementAndFilePath()`, which is present in 2.4.1 and covers both
the global path skip and the rule-scoped one. Verified against the floor's source before
re-pushing, along with every other Rector API this change touches:
`RelatedConfigInterface`, `ResettableInterface`, `Skipper::shouldSkipFilePath()`,
`RenamedClassesDataCollector::addOldToNewClasses()`, `Option::PATHS`,
`SimpleParameterProvider` and `AbstractRector::getFile()` all exist at 2.4.1.

This is the `provideMinPhpVersion()` lesson from the authoring guideline generalised:
**anything resolved from `vendor/rector/rector` can be newer than the declared floor.**
Check the floor's source, not the installed copy.
