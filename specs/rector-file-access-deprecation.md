# Harden against Rector 2.4.5 `beforeTraverse` + `getFile()` deprecations

## Overview

Rector 2.4.5 deprecated two file-access mechanisms this package leans on. Overriding
`beforeTraverse()` now emits a **runtime** `[WARNING]` on every run of
`NamedArgumentFromManifestRector` (confirmed by a consumer on 0.9.2), and the
`AbstractRector::getFile()` helper is `@deprecated` ("no longer used") across five
other call sites. This change moves the manifest rule to the Rector-recommended
`FileNode` hook and routes every file-path lookup through a single injected
`CurrentFileProvider`, removing both deprecations from the package's surface.

## Assumptions

<!-- Sign off by skimming this section alone. -->

> **⚠ Superseded in part.** The `CurrentFileProvider` / `ResolvesCurrentFile` bullets below
> describe the *originally planned* Phase 2, which was **abandoned at implementation time**
> (it tripped 50 PHPStan `internalClass` errors — `CurrentFileProvider` is `@internal`). The
> shipped fix is Phase 1 only and keeps `getFile()`. See the Implementation banner,
> Resolved Questions #3, and Findings.

- **The runtime warning is the `beforeTraverse` *override*, not `getFile()`.** Exact
  text reported by a consumer (Rector 2.4.5, rector-rules 0.9.2):
  `Rector rule "…NamedArgumentFromManifestRector" uses deprecated "beforeTraverse"
  method. … Use "Rector\PhpParser\Node\FileNode" to hook into file-level changes
  instead.` Only `NamedArgumentFromManifestRector` overrides `beforeTraverse` in this
  package (verified — it is the sole `function beforeTraverse` in `src/`).
- **Fix = the `FileNode` node-type pattern, the same one Rector core uses.**
  `FileProcessor` wraps every file's stmts in a `FileNode` unconditionally
  (`FileProcessor.php:173`), and core rules (e.g. `RemoveUselessAliasInUseStatementRector`)
  register `[FileNode::class, …]` and branch on `$node instanceof FileNode` in
  `refactor()`. `FileNode` is the root node, visited before the call nodes — the same
  ordering guarantee `beforeTraverse` gave, so the per-file setup keeps working.
- **`FileNode` is proven safe at the `^2.4.1` floor, not just installed 2.4.5.**
  `AliasImportRector` already imports `Rector\PhpParser\Node\FileNode` (`:40`) and
  checks `$stmts[0] instanceof FileNode` (`:431`) — that code ships today and is green
  on the prefer-lowest CI leg, so the class exists in the floor. Phase 3 keeps an
  explicit floor check anyway (the package has a documented `PhpVersionFeature`-newer-
  than-floor gotcha precedent — see CLAUDE.md).
- **`FileNode` carries no file path**, so the per-file basename lookup still needs a
  path source. We inject `CurrentFileProvider` and read `getFile()?->getFilePath()`.
- **Path access is centralised in one new trait, `ResolvesCurrentFile`.** It holds the
  injected `CurrentFileProvider` and exposes `currentFilePath(): string` /
  `currentFileNewStmts(): array`. The two context traits (`ChecksRouteContext`,
  `ChecksMigrationContext`) `use` it; each consuming rule injects `CurrentFileProvider`
  in its constructor. Chosen over an `AbstractFileAwareRector` base class (user
  decision) — no base-class change, idiomatic Rector.
- **Phase 2 swaps `@deprecated` for `@internal`.** `CurrentFileProvider` is itself
  tagged `@internal` ("Avoid this service if possible, pass File value object or file
  path directly"). So replacing `getFile()` (deprecated) with `CurrentFileProvider`
  (internal) is a lateral move on advisory tags — it is exactly what `AbstractRector`
  does internally, and neither tag trips this package's PHPStan today. The runtime
  `beforeTraverse` warning (Phase 1) is the only *visible* problem; Phase 2 is
  forward-compat hygiene against a Rector-3 removal. See Open Questions #1 — Phase 2 is
  vetoable independently of Phase 1.
- **`CurrentFileProvider::getFile()` can return null** (no file set, e.g. a bare unit
  test). `currentFilePath()` returns `''` in that case, which the directory guards
  (`str_contains($path, '/routes/')`) treat as "not in scope" → safe no-op. This is
  *safer* than today: `AbstractRector::getFile()` throws on a null file.
- **The 0.9.2 `ConfigureManifestTest` needs a one-line update.** It news the rule bare
  (`new NamedArgumentFromManifestRector()`); the new required constructor param means
  it must pass `new CurrentFileProvider()`. `configure()` itself never touches the
  provider, so no behavioural change to those tests.

---

## 1. Current State

Six `getFile()` call sites + one `beforeTraverse` override, all against Rector 2.4.5
(`AbstractRector`: `getFile()` is `@deprecated no longer used` at line 135; the
`beforeTraverse` override is runtime-warned by Rector's rule registrar):

| Site | File | Use |
|------|------|-----|
| `beforeTraverse()` override | `Rector/CodeQuality/NamedArgumentFromManifestRector.php:124` | Per-file record setup (runtime `[WARNING]`) |
| `getFile()->getFilePath()` | same file, `:167` (inside `beforeTraverse`) | Current file path |
| `getFile()->getFilePath()` | `Rector/Routing/Concerns/ChecksRouteContext.php:21` | `/routes/` guard — serves `NormalizeRoutePathRector`, `RouteGroupArrayToMethodsRector`, `MiddlewareStringToClassRector` |
| `getFile()->getFilePath()` | `Rector/Migration/Concerns/ChecksMigrationContext.php:13` | `/migrations/` guard — serves `InlineMigrationConstantsRector`, `RemoveAfterColumnPositioningRector`, `FlagColumnToBooleanRector` |
| `getFile()->getFilePath()` | `Rector/Import/AliasImportRector.php:413` | Per-file state reset |
| `getFile()->getNewStmts()` | `Rector/Import/AliasImportRector.php:428` | Scan existing imports |

`CurrentFileProvider` (`Rector\Application\Provider\CurrentFileProvider`) is a newable
service with no constructor deps: `setFile(File)` / `getFile(): ?File`.

## 2. The shared trait

New `src/Rector/Concerns/ResolvesCurrentFile.php`:

```php
namespace Hihaho\RectorRules\Rector\Concerns;

use PhpParser\Node\Stmt;
use Rector\Application\Provider\CurrentFileProvider;
use Rector\ValueObject\Application\File;

trait ResolvesCurrentFile
{
    // Declared by the trait, *assigned* by each consuming rule's constructor. A rule
    // must NOT also promote a `currentFileProvider` ctor param — that double-declares
    // the property and fatals. Take a plain param and assign it (see §4).
    private CurrentFileProvider $currentFileProvider;

    private function currentFilePath(): string
    {
        $file = $this->currentFileProvider->getFile();

        // Null when no file is set (bare unit test). '' fails every directory guard,
        // so the rule safely no-ops — unlike AbstractRector::getFile(), which throws.
        return $file instanceof File ? $file->getFilePath() : '';
    }

    /** @return Stmt[] */
    private function currentFileNewStmts(): array
    {
        $file = $this->currentFileProvider->getFile();

        return $file instanceof File ? $file->getNewStmts() : [];
    }
}
```

## 3. `NamedArgumentFromManifestRector` — `beforeTraverse` → `FileNode`

1. Delete the `beforeTraverse()` override, the `#[Override]` attribute, and the
   `use Override;` import.
2. Add `FileNode::class` (`Rector\PhpParser\Node\FileNode`) to `getNodeTypes()`.
3. `use ResolvesCurrentFile;` and add a constructor injecting `CurrentFileProvider`.
4. In `refactor()`, handle the `FileNode` branch *first* (it is visited before the call
   nodes), doing exactly what `beforeTraverse` did, then `return null`:

   ```php
   if ($node instanceof FileNode) {
       $this->currentFilePath = str_replace('\\', '/', $this->currentFilePath());
       $this->currentFileRecords = $this->recordsByBasename[basename($this->currentFilePath)] ?? [];
       $this->currentFileHasNoRecords = $this->currentFileRecords === [];

       return null;
   }
   ```

   The existing `MethodCall|StaticCall|New_` guard and body stay unchanged below it.

The three cached properties (`currentFilePath`, `currentFileRecords`,
`currentFileHasNoRecords`) keep the per-node hot path a single bool check, exactly as
today. `currentFileHasNoRecords` keeps its `true` default so a file whose `FileNode`
somehow never fires bails safely rather than reusing a prior file's records.

**Cost is neutral, not new.** Registering `FileNode::class` makes `refactor()` fire
once per file with the `FileNode` — but `beforeTraverse` already ran once per file, so
the per-file setup cost is unchanged. The per-node hot path for the call nodes
(`MethodCall|StaticCall|New_`) is untouched: the same single-bool `currentFileHasNoRecords`
gate. Net performance is identical to today.

## 4. `getFile()` cleanup at the other five sites (Phase 2)

For each rule, inject `CurrentFileProvider` via the constructor and assign it to the
trait property. Rules with an existing promoted constructor keep their promoted params
and add a plain `CurrentFileProvider $currentFileProvider` param assigned in the body:

```php
public function __construct(
    private readonly ValueResolver $valueResolver,   // existing, promoted
    CurrentFileProvider $currentFileProvider,        // plain — trait owns the property
) {
    $this->currentFileProvider = $currentFileProvider;
}
```

**PHPStan enforces completeness — treat a hit as a missing constructor, not a false
positive.** The trait property is non-nullable with no default, so any consuming rule
whose constructor does not assign it trips PHPStan (`bleedingEdge`) with an
uninitialised-property error (and would fatal at runtime with "must not be accessed
before initialization"). That is the safety net: if Phase 3 PHPStan flags a rule here,
the fix is to add/extend that rule's constructor — never to suppress.

- **`ChecksRouteContext` / `ChecksMigrationContext`**: `use ResolvesCurrentFile;` and
  replace `str_replace('\\', '/', $this->getFile()->getFilePath())` with
  `str_replace('\\', '/', $this->currentFilePath())`.
- **Consuming rules** (`NormalizeRoutePathRector`, `RouteGroupArrayToMethodsRector`,
  `MiddlewareStringToClassRector`, `InlineMigrationConstantsRector`,
  `RemoveAfterColumnPositioningRector`, `FlagColumnToBooleanRector`): add the
  constructor injection above. Rules without a constructor gain one; rules with one
  gain the extra param.
- **`AliasImportRector`**: `use ResolvesCurrentFile;`, add the injection to its existing
  constructor, replace `:413` with `$this->currentFilePath()` and `:428` with
  `$this->currentFileNewStmts()`.

## Edge Cases

| Scenario | Handling |
|----------|----------|
| `CurrentFileProvider::getFile()` returns null (no file set) | `currentFilePath()` returns `''`; directory guards no-op; `FileNode` branch sets `currentFileHasNoRecords = true`. Safer than today's throw. Phase 1 + 2 Tests. |
| `FileNode` visited but file has no manifest records | `currentFileRecords = []`, `currentFileHasNoRecords = true`; call nodes bail on the existing single-bool guard. Covered by existing 14 fixtures (most files have no records). |
| Rule processes file A (records) then file B (none) | B's `FileNode` resets all three cached properties; no record bleed from A. Phase 1 Tests (multi-file fixture or existing suite). |
| Manifest rule on a first-class callable / already-named arg | Unchanged — the `refactor()` call-node branch is untouched; only the file-setup path moved. Existing fixtures cover it. |
| Mixed promoted + plain ctor params (FlagColumn, AliasImport) | Trait owns the `currentFileProvider` property; rule assigns it in the body — no double-declaration. Verified by PHPStan + suite green. |
| A consuming rule's constructor forgets to assign the provider | PHPStan (`bleedingEdge`) flags an uninitialised non-nullable property at Phase 3 — a self-enforcing completeness check. Fix = add the assignment, never suppress. |
| `tests/**/Source/*.php` reflection doubles mangled by CI auto-fix | No `Source` doubles are touched here, but confirm `rector process --dry-run` is `changed_files:0` before push (CLAUDE.md auto-fix gotcha). Phase 3. |

## Implementation

> **⚠ Course correction (implementation time).** The `CurrentFileProvider` /
> `ResolvesCurrentFile` design in §2–§4 was **abandoned mid-implementation** — it tripped
> **50 PHPStan `internalClass` errors** (`CurrentFileProvider` is `@internal`; using it
> across our namespace boundary is flagged, and CLAUDE.md forbids suppressing). `getFile()`
> by contrast is `@deprecated` but **not** flagged by this package's PHPStan, so the shipped
> fix keeps `getFile()` everywhere and only removes the `beforeTraverse` *override* via the
> `FileNode` pattern. §2 (trait) and §4 (injection) are **superseded**; see Findings.

### Phase 1: Remove the `beforeTraverse` override (Priority: HIGH) — DONE

- [x] `NamedArgumentFromManifestRector` — drop the `beforeTraverse` override, `#[Override]`,
      `use Override`, and its orphaned docblock; add `FileNode::class` to `getNodeTypes()`;
      handle the `FileNode` branch in `refactor()`, resolving the path with
      **`$this->getFile()`** (not `CurrentFileProvider`). No constructor, no trait.
- [x] Confirm the 14 existing `NamedArgumentFromManifestRector/Fixture/*.php.inc` still
      pass (matching logic unchanged; only the file-setup hook moved). 21 manifest tests green.
- [x] Tests — assert the rule no longer overrides `beforeTraverse`
      (`ReflectionMethod(...)->getDeclaringClass()` is `AbstractRector`) and that
      `getNodeTypes()` contains `FileNode::class`. Pins the regression. Both added to
      `ConfigureManifestTest` with bare `new NamedArgumentFromManifestRector()`.

### Phase 2: Route every `getFile()` through a provider (Priority: MEDIUM) — ABANDONED

*Reverted entirely.* Replacing `getFile()` with the `@internal` `CurrentFileProvider`
produced 50 PHPStan `internalClass` errors (one per use site × analysis context). Since the
`@deprecated` `getFile()` is **not** flagged by our PHPStan and still works, the swap is
strictly harmful. The five other `getFile()` sites (the two context traits + `AliasImportRector`)
**keep `getFile()` unchanged**. The `getFile()` static deprecation remains a Rector-3-removal
risk only — to be revisited if/when Rector exposes a non-`@internal`, non-`@deprecated`
file-path accessor.

- [ ] ~~Route the 5 remaining sites through `CurrentFileProvider`~~ — abandoned (see above).

### Phase 3: Verification (Priority: HIGH) — DONE

- [x] `vendor/bin/pest` — full suite green (315 passed / 1 skipped; the 2 warnings are
      pre-existing, present at 0.9.2). Run with `PAO_DISABLE=1` (see Findings).
- [x] `vendor/bin/phpstan analyse --memory-limit=2G` — `errors:0`.
- [x] `vendor/bin/rector process --dry-run` — `changed_files:0` (cache cleared first).
- [ ] Manual: confirm the `beforeTraverse [WARNING]` is gone from a real Rector run
      (deferred to a consumer check; the override removal is pinned by the reflection test).
- [x] Floor check — `FileNode` resolves under `rector/rector:^2.4.1` (`AliasImportRector`'s
      existing `FileNode` use ships green on prefer-lowest). `getFile()` is unchanged from
      0.9.2, so no new floor surface.

---

## Open Questions

None.

---

## Resolved Questions

3. **Is Phase 2 worth doing now, given it trades `@deprecated` for `@internal`?**
   **Decision (revised at implementation time): NO — Phase 2 abandoned.** The user
   initially opted to fold it in on the stated premise that "neither tag trips this
   package's PHPStan." **That premise was false** and only surfaced once the code was
   written: depending on the `@internal` `CurrentFileProvider` across our namespace
   boundary produces **50 PHPStan `internalClass` errors**, whereas the `@deprecated`
   `getFile()` is *not* flagged. CLAUDE.md forbids suppressing the errors, so the swap
   cannot ship. **Rationale:** the `@internal` tag is a stronger signal than `@deprecated`
   here — Rector is telling consumers not to depend on `CurrentFileProvider`, and our gate
   enforces it. Phase 1 (the runtime `beforeTraverse` warning) ships alone; the `getFile()`
   static deprecation stays until a non-flagged accessor exists.


1. **Trait + per-rule constructor injection, or an `AbstractFileAwareRector` base
   class?** **Decision:** Shared `ResolvesCurrentFile` trait; each rule injects
   `CurrentFileProvider` in its constructor. **Rationale:** No base-class change to ~7
   rules, composes with the existing `ChecksRouteContext` / `ChecksMigrationContext`
   traits, idiomatic for Rector rules (which already mix `autowire()` + a rule
   constructor).

2. **Spec scope — `beforeTraverse` only, or also the `getFile()` sites?** **Decision:**
   Both, as two phases. **Rationale:** Same root cause (Rector 2.4.5 file-access
   deprecations); user opted to fold the `getFile()` cleanup in. Phase 2 is marked
   MEDIUM + independently vetoable because its tradeoff is softer (see Open Questions #1).

## Findings

<!-- Notes added during implementation. Do not remove this section. -->

- **Shipped fix (final).** `NamedArgumentFromManifestRector` only: `beforeTraverse`
  override removed, `FileNode::class` registered, per-file record setup done in the
  `FileNode` branch of `refactor()` using `$this->getFile()->getFilePath()`. No
  constructor, no trait, no `CurrentFileProvider`. 21 manifest tests pass (incl. all 14
  fixtures — transforms unchanged), full suite 315/1-skip, PHPStan 0, Rector
  `changed_files:0`. **Net diff: 2 files** (`NamedArgumentFromManifestRector` + its
  `ConfigureManifestTest`).
- The two regression tests pin the fix: `beforeTraverse`'s declaring class is
  `AbstractRector` (override removed), and `getNodeTypes()` contains `FileNode::class`.

- **Why Phase 2 + the `CurrentFileProvider` design were abandoned (the central finding).**
  The first implementation built `ResolvesCurrentFile` + injected `CurrentFileProvider`
  into 7 rules and both context traits (per §2–§4). It passed the per-area tests but
  **PHPStan reported 50 `internalClass` errors** — `CurrentFileProvider` is `@internal`
  and PHPStan's `internalClass` rule flags every cross-namespace use. CLAUDE.md forbids
  suppression, so the entire approach was reverted (`git checkout HEAD -- …` on 11 files +
  deleting the trait). The evaluation finding "neither tag trips our PHPStan" was correct
  for `@deprecated getFile()` but **wrong for `@internal CurrentFileProvider`** — verified
  empirically only after writing the code. Lesson: an `@internal` dependency is a harder
  blocker than a `@deprecated` one under this package's gate.
- **A discarded sub-finding from the abandoned approach** (kept for the record): the trait
  property had to be `readonly`, because the two trait-isolation tests host the trait in a
  `readonly` anonymous class and a non-readonly trait property fatals there. Moot now that
  the trait is gone.
- **`laravel/pao` crashes the test run** unless `PAO_DISABLE=1` — exactly as a consumer
  flagged independently. A bare `vendor/bin/pest` died in pao's `restoreStdout()`
  (`NoTestCaseObjectOnCallStackException`); `PAO_DISABLE=1 vendor/bin/pest …` runs clean.
  Local-only (CI is unaffected); worth a `PAO_DISABLE=1` note in the README's manifest
  section for agent-wrapped Rector runs (a separate doc follow-up, not code).
- A gitignored autoresearch bench (`autoresearch/named-arg-manifest-bench.php`) calls
  `beforeTraverse()` directly — now broken by the override removal. Not shipped, not in the
  suite, not CI-gated; left as-is (a local perf artifact). Re-point it to a `FileNode`
  driver if rerun.
