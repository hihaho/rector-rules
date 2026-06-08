# Assert Database Table String → Model Class

## Overview

A Rector rule that rewrites the table-name **string literal** in database test
assertions — `assertDatabaseHas('users', …)` → `assertDatabaseHas(User::class, …)`
— when the string can be confidently resolved to an Eloquent model whose table it
matches. Laravel's database assertions accept a model class in place of a table
name and resolve the table from it, so this is behaviour-preserving while making
the reference rename-safe and IDE-navigable. Automates finding #10 in
`docs/review-automation-findings.md` (from the PR research).

---

## 1. Current State

No rule exists. Reviewers flag the magic string by hand, e.g. the source review
(`tests/.../SocialAuthControllerTest.php`):

```php
- $this->assertDatabaseMissing('users', ['email' => $socialiteUser->getEmail()]);
+ $this->assertDatabaseMissing(User::class, ['email' => $socialiteUser->getEmail()]);
```

A literal `'users'` is invisible to "find usages", silently rots if the table is
renamed, and duplicates knowledge the model already owns. Laravel resolves the
table from a model class for all the relevant assertions, so `User::class` is an
exact behavioural substitute **when the model's table equals the string** — which
is the safety condition the rule must prove before rewriting.

Laravel assertions that accept `Model|string $table` (first argument):
`assertDatabaseHas`, `assertDatabaseMissing`, `assertDatabaseCount`,
`assertSoftDeleted`, `assertNotSoftDeleted`.

## 2. Rule Design

New rule: `Hihaho\RectorRules\Rector\Testing\AssertDatabaseTableToModelClassRector`
(new `Testing` category — these are PHPUnit/TestCase assertion calls).

**Node type:** `[MethodCall::class]` (the assertions are `$this->assert…()`;
`self::`/`static::` is `StaticCall`, handled in Phase 2 alongside the Pest
function form).

**Trigger conditions (all required):**

- method name ∈ the assertion set above;
- receiver is `$this` **and the enclosing class is a genuine test context** —
  it extends `PHPUnit\Framework\TestCase` (transitively, e.g. Laravel's
  `Tests\TestCase`) or uses the `Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase`
  trait. This prevents rewriting a same-named method on an unrelated helper/base
  class whose first argument is a non-table string. (`self`/`static`/Pest
  `FuncCall` forms in Phase 2.);
- `args[0]->value` is a **`String_` literal** (skip variables, concatenations, and
  anything already a `ClassConstFetch`);
- the string resolves to exactly one confident model (see §3) — **otherwise leave
  the call untouched**.

**Rewrite:** replace `args[0]->value` with
`new ClassConstFetch(new FullyQualified($modelFqcn), 'class')`
→ `\App\Models\User::class`, which `withImportNames()` shortens to `User::class`.

## 3. Table → Model resolution (the safety-critical core)

A wrong mapping silently retargets the assertion to a different table → a test that
passes/fails against the wrong data. The mapping must therefore be **verify-or-skip**:
only rewrite when the candidate model's *own* resolved table equals the literal.

```
resolveModel(string $table): ?string   // model FQCN, or null = leave the string
  1. candidate FQCN (the config map ONLY selects a candidate — it does NOT skip
     verification; a stale entry must still fail the checks below):
        if (Phase 2) config table_to_model[$table] set → $fqcn = that
        else (Phase 1) $fqcn = rtrim($modelNamespace,'\\') . '\\'
                               . Str::studly(Str::singular($table))   // default ns: App\Models
  2. if ! reflectionProvider->hasClass($fqcn)                          → null
  3. $cr = reflectionProvider->getClass($fqcn)
     if ! $cr->isSubclassOf(Illuminate\Database\Eloquent\Model::class) → null
  4. GUARD against runtime-dynamic tables (static analysis can't see them):
        $getTable = $cr->getNativeReflection()->getMethod('getTable')
        if $getTable->getDeclaringClass()->getName() !== Illuminate\…\Model::class → null
        // getTable() is overridden (incl. via a trait, which PHP flattens onto the
        // model) → the runtime table is not statically knowable → skip.
  5. VERIFY the table matches (mandatory) — mirror Laravel's Model::getTable(),
     which is `$this->table ?? Str::snake(Str::pluralStudly(class_basename($this)))`:
        $declared = $cr->getNativeReflection()->getProperty('table')->getDefaultValue()
                    // EFFECTIVE default, resolved through inheritance (own OR inherited
                    // from an abstract base) — exactly what getTable() reads.
                    // null when no ancestor sets $table.
        $resolved = (is_string($declared) && $declared !== '')
                      ? $declared
                      : Str::snake(Str::pluralStudly(class_basename($fqcn)))
        if $resolved !== $table                                        → null   // mismatch → skip
  6. return $fqcn
```

**Why verify-or-skip is the whole design:** convention guessing is fragile
(pluralisation irregulars, custom `$table`, two models sharing a table, dynamic
`getTable()`). Steps 4–5 turn every failure mode into a *missed* conversion (safe),
never a *wrong* one — and the config-map path is funneled through the *same*
verification, so a stale override entry is caught, not trusted. When in doubt, the
literal string is left exactly as-is.

> **Residual risk (documented, see Open Questions 1):** a model that assigns
> `$table` in its constructor or a trait *initializer* (`initialize{Trait}`)
> *without* overriding `getTable()` evades step 4, and step 5 would fall through to
> the convention value. If that convention value coincidentally equals the literal
> while the real runtime table differs, the rewrite would mis-target. This is rare
> and an anti-pattern, but the static algorithm cannot detect it; accept it as a
> known limitation or require a static `$table` default for conversion (stricter,
> but misses the common convention-only model — the source review case).

**Inflection dependency.** `Str::singular`/`pluralStudly` come from
`illuminate/support`. It is not a direct dependency of this package today, but the
rule only ever runs while analysing a Laravel project, where `illuminate/support`
is always autoloadable. Declare it in `composer.json` `require` (or `suggest`) so
the dependency is explicit — see Resolved Questions 1.

## 4. Placement & Registration

Mirror the Eloquent rules added earlier:

- Rule: `src/Rector/Testing/AssertDatabaseTableToModelClassRector.php`.
- Implements `ConfigurableRectorInterface` (`model_namespace`, default `App\Models`;
  `table_to_model`, default `[]`).
- Set: `config/sets/testing.php`; `HihahoSetList::TESTING` constant;
  `config/sets/all.php` import — all kept alphabetical.
- Tests: `tests/Rector/Testing/AssertDatabaseTableToModelClassRector/` with
  `config/configured_rule.php`, a test class, `Source/` models, `Fixture/*.php.inc`.

## 5. Non-Goals

- **Never rewrite an unverified string.** Missed conversions are acceptable; wrong
  ones are not.
- Do not touch non-literal first args (variables, concatenation, method calls).
- Do not convert assertions that don't accept a model (e.g. `assertDatabaseHas` is
  in; raw `DB::table('x')` assertions are out — different concern).
- Do not add/teach pluralisation rules beyond what `Str` provides; rely on the
  explicit `table_to_model` map for irregulars convention can't resolve.

## Implementation

### Phase 1: Core rule + verify-or-skip boundary (Priority: HIGH)

Resolution **and** verification ship together — the rule is not viable until the
skip-on-mismatch fixtures pass, because that boundary is the only thing preventing
a silently mis-targeted assertion.

- [x] Create `AssertDatabaseTableToModelClassRector` in `src/Rector/Testing/` — `MethodCall`, `$this` receiver, methods `assertDatabaseHas`/`assertDatabaseMissing`, first arg `String_` only.
- [x] **Gate on test context** — require the enclosing class to extend `PHPUnit\Framework\TestCase` or use the `InteractsWithDatabase` trait (via the scope's `ClassReflection`). Skip otherwise.
- [x] Implement `ConfigurableRectorInterface` with `model_namespace` (default `App\Models`); inject `ReflectionProvider`.
- [x] Implement `resolveModel()` per §3, including the **dynamic-`getTable()` guard** (§3 step 4 — skip if `getTable()`'s declaring class isn't `Model`) and the **mandatory table verification** (§3 step 5 — effective `$table` default else convention; compare to the literal); return `null` on any uncertainty.
- [x] Emit `ClassConstFetch(FullyQualified($fqcn), 'class')` for `args[0]` only when `resolveModel()` is non-null.
- [x] Tests (convert) — `assertDatabaseHas('users', …)` → `User::class` with a `Source\User` whose convention table is `users`; same for `assertDatabaseMissing`.
- [x] Tests (skip — the safety boundary, blocking) — (a) no model class for the table → unchanged; (b) class exists but isn't a `Model` → unchanged; (c) model with a custom static `protected $table` ≠ the string → unchanged; (d) model that **overrides `getTable()`** (and a trait-provided `getTable()`) even though convention would match → unchanged; (e) irregular plural the convention mis-singularises → unchanged; (f) first arg is a variable / concat / already `Model::class` → unchanged; (g) a **non-TestCase class defining its own `assertDatabaseHas('something', …)`** → unchanged.

### Phase 2: Coverage & ergonomics (Priority: MEDIUM)

- [x] Explicit `table_to_model` override map for irregular/ambiguous tables — the map only *selects the candidate FQCN*, which then flows through the **same** §3 verification (steps 2–5); a configured entry whose model table ≠ the literal must still be skipped. Fixtures: (i) custom-`$table` model resolved via the map and verified → converted; (ii) stale map entry pointing at a model whose table ≠ the literal → unchanged.
- [x] Extend to `assertDatabaseCount`, `assertSoftDeleted`, `assertNotSoftDeleted` — same first-arg resolution.
- [x] Handle `self::`/`static::` (`StaticCall`) and the Pest global `assertDatabaseHas(...)` (`FuncCall`) receiver forms — fixtures for each.
- [x] Tests — the above, plus a model declaring an explicit `protected $table` that matches the string (verified via the declared value, not convention).

### Phase 3: Registration, docs, alignment (Priority: LOW)

- [x] Add `config/sets/testing.php`, `HihahoSetList::TESTING`, and the `all.php` import (alphabetical).
- [x] Document in `README.md` under a new "Testing" set section (table + before/after + the verify-or-skip scope note), matching the Eloquent section style.
- [x] Add `illuminate/support` to `composer.json` per Resolved Questions 1; run the completion checks (`pint`, `phpstan`, `pest`, `rector process` self-run) clean.

---

## Open Questions

None — see Resolved Questions 3 and 4.

---

## Resolved Questions

1. **Where does the Str inflection dependency come from?** **Decision:** do **not**
   add `illuminate/support` to `require`; at most declare it under `suggest` (Phase 3).
   **Rationale:** the rule needs `Str::singular`/`pluralStudly`, but those resolve
   from the analysed Laravel project at runtime and from `orchestra/testbench`
   (require-dev) for this package's own tests/PHPStan. The README already constrains
   consumers to Laravel `^12||^13`, so the library is always present. Adding a
   production `require` to a public package for a universally-present library
   conflicts with the minimise-dependencies guideline. (Deviates from the original
   decision — see Findings.)

2. **Category placement.** **Decision:** new `Testing` category, not `Eloquent`.
   **Rationale:** the trigger is a PHPUnit/TestCase assertion call; the Eloquent
   model is the *target* of resolution, not the subject. Keeps categories aligned
   with the node being matched, consistent with the existing layout.

3. **Residual dynamic-table risk (was Open Question 1).** **Decision:** (a) accept as
   a documented limitation. **Rationale:** the verify-or-skip core already catches
   `getTable()` overrides (incl. trait-provided) and static `$table` mismatches; only
   a model assigning `$this->table` dynamically (constructor / trait `initialize*`
   hook) *without* overriding `getTable()`, whose convention table coincidentally
   equals the literal, evades it — rare, an anti-pattern. Option (b) would skip the
   common convention-only model the rule exists for. **Update (Codex review):** this
   turned out to be statically *detectable*, so it is now **guarded**, not merely
   accepted — `hasInertConstruction()` skips any model declaring its own constructor
   or carrying an `initialize*` trait hook (either can mutate `$table`/`$connection`
   at construction). See Findings.

4. **Two models sharing one table (was Open Question 2).** **Decision:** trust the
   name-match + table-verification; lean on the explicit `table_to_model` map
   (Phase 2) for ambiguous tables. **Rationale:** enumerating every model in Rector
   is expensive, and verification already guarantees the chosen model's table equals
   the literal; a coincidental second owner is left to the explicit map.

## Findings

- **Phase 1 implemented (2026-06-08).** `AssertDatabaseTableToModelClassRector` in
  `src/Rector/Testing/`, configurable `model_namespace`, verify-or-skip resolution
  (dynamic-`getTable()` guard + table verification). 10 fixtures (2 convert, 8
  blocking skips) green; PHPStan clean; full suite 160 passing.
- **Test-context gate narrowed to `isSubclassOfClass(TestCase)` (deviation from §3 /
  the Phase 1 gate task).** The "or uses `InteractsWithDatabase` trait" arm was
  dropped: a class using that trait *without* a TestCase base is not valid in
  practice (the trait's bodies require TestCase), and every real test carrying these
  assertions extends a PHPUnit TestCase, which already matches. Stricter = safer,
  consistent with "a missed conversion is fine; a wrong one is not." Bare trait users
  and Pest's function form are deferred to Phase 2.
- **`illuminate/support` not added to `require`** (see Resolved Questions 1); the
  rule calls `Illuminate\Support\Str` statically, resolved transitively.
- **Phase 2 implemented (2026-06-08).** `table_to_model` map (selects candidate,
  same verification — stale entry still skipped), `assertDatabaseCount` added, and the
  `self::`/`static::` `StaticCall` form (gated on the enclosing TestCase).
- **Pest global `assertDatabaseHas(...)` (`FuncCall`) form deferred.** No safe static
  test-context gate exists for a bare function call — there is no enclosing class to
  prove it is a test, and Laravel/Pest ship no such global function — so matching it
  would violate the rule's mandatory-gate principle. The idiomatic Pest form is
  `$this->assertDatabaseHas(...)`, already handled by the MethodCall path when the
  closure's scope resolves to a TestCase.
- **Codex review hardening (2026-06-08).** Three further wrong-rewrite paths closed,
  each with a regression fixture: (1) **connection** — passing a model also selects
  its connection, so a model with a non-default `$connection` (or an overridden
  `getConnectionName()`) is now skipped; (2) **empty `$table`** — `protected $table
  = ''` is a real (empty) table to Eloquent, so the match now mirrors
  `$this->table ?? convention` exactly (any string default, incl. `''`, is used as-is;
  only `null` falls to convention); (3) **test-local override** — a TestCase that
  declares its own `assertDatabaseHas` is skipped (it is not Laravel's assertion).
  17 fixtures total.
- **Codex re-review hardening (2026-06-08).** The local-override guard was widened:
  the assertion must resolve to Laravel's own provider (`Foundation\TestCase` / the
  `InteractsWithDatabase` trait), so a custom `assertDatabaseHas` inherited from an
  intermediate base test class is skipped too, not just a same-class override.
- **Soft-delete assertions dropped (Codex re-review, 2026-06-08; deviation from §1/
  Phase 2).** `assertSoftDeleted`/`assertNotSoftDeleted` were removed from the
  converted set. With a model class Laravel also resolves the deleted-at column via
  `getDeletedAtColumn()` and requires a soft-deletable model, so a table+connection
  match does not prove behaviour is preserved (a custom deleted-at column would be
  silently swapped; a non-soft-deletable model would fatal). The supported set is now
  `assertDatabaseHas`/`assertDatabaseMissing`/`assertDatabaseCount`, whose model form
  resolves only table + connection. 18 fixtures total.
- **Construction guard added (Codex re-review, 2026-06-08).** Laravel's `newModelFor()`
  instantiates the model before reading its table/connection, so a userland
  constructor or an `initialize{Trait}()` hook can `setTable()`/`setConnection()` past
  the static default/override checks. `hasInertConstruction()` now skips any model
  that declares its own constructor or any `initialize*` method. Closes the residual
  documented in Resolved Question 3. 21 fixtures total.
- **Helper-override guard added (Codex re-review, 2026-06-08).** The database
  assertions dispatch to instance helpers (`getTable`/`getConnection`/
  `getTableConnection`/`newModelFor`); a test base overriding any of them could make
  the model and string forms diverge. `isInTestContext()` now skips when the
  assertion or any of those helpers resolves outside the framework provider allowlist.
  22 fixtures total.
- **Resolve-to-framework requirement (Codex re-review, 2026-06-08).** The guard no
  longer treats an *absent* assertion as safe: the matched assertion must resolve to
  Laravel's provider (present **and** declaring class in the allowlist), else skip —
  closing magic-`__call`/non-Laravel dispatch. Convert + resolveModel-skip fixtures
  now extend `Illuminate\Foundation\Testing\TestCase` (a faithful Laravel test
  context where the assertion resolves to the framework), not bare PHPUnit; the
  userland-override fixtures keep plain PHPUnit on purpose. 22 fixtures total.
