# Migration Flag Column → boolean

## Overview

A Rector rule that rewrites flag-style integer columns in migrations —
`$table->tinyInteger('enable_x')->default(1)` → `$table->boolean('enable_x')->default(true)`
— so boolean flags use the `boolean()` column type and `true`/`false` defaults
instead of a `tinyInteger` + `0`/`1`. Automates finding #7 in
`docs/review-automation-findings.md` (from the PR research). It lives next to the existing
migration rules and reuses their migration-directory gating.

---

## 1. Current State

No rule exists. Reviewers flag it by hand, e.g. the source review:

```php
- $table->tinyInteger('is_published')->default(1);
+ $table->boolean('is_published')->default(true);
```

The repo already has the infrastructure to model this on:

- `src/Rector/Migration/RemoveAfterColumnPositioningRector.php` — `MethodCall`
  rule gated by the `ChecksMigrationContext` trait (`isInMigrationsDirectory()`),
  using `isObjectType($node->var, …)` to confirm the fluent-chain receiver.
- `src/Rector/Migration/InlineMigrationConstantsRector.php` — reflection/value
  handling of constants in migrations.
- `config/sets/migrations.php` + `HihahoSetList::MIGRATIONS` already exist, so this
  rule only needs to be added to that set (no new category/set).

## 2. When the conversion is safe (the verify-or-skip boundary)

`tinyInteger` → `boolean` is **only behaviour-preserving under MySQL/MariaDB**,
where `tinyInteger` is `tinyint` and `boolean` is `tinyint(1)` — same 1-byte
storage, identical data, the difference is display-width metadata. On PostgreSQL it
is `smallint`→`boolean` (a real, incompatible type change) — verified in the
vendored grammars. **All** of the gates below must hold; if any fails, **leave the
column untouched**:

0. **Driver opt-in.** The rule is a **no-op unless explicitly configured**
   `confirm_mysql_compatible: true` (and it is *not* in the default migrations set —
   see §4). Rector cannot introspect the app's DB connection, so this is the only
   way to stop the rule silently doing an incompatible change on a Postgres/SQLite
   project. Default off.
1. **Column type** is exactly signed `tinyInteger` (never wider types, and **not**
   `unsignedTinyInteger` — see below), **and not auto-increment** — skip if the type
   call's 2nd arg is `true` or the chain contains `->autoIncrement()` (an
   auto-increment tinyint is a key, never a boolean). `unsignedTinyInteger` is
   excluded because its 0-255 range would be lost if a misclassified flag-named
   column were narrowed to a signed `tinyint(1)`; signed `tinyInteger`→`boolean` is
   storage-identical so it carries no such risk.
2. **Column name** matches a configurable flag pattern (default prefixes:
   `is_`, `has_`, `should_`, `can_`, `are_`, `allow(s)_`, `enable(s)_`, `enabled`,
   `require(s)_`, `required`, `disable(s)_`; default suffixes: `_enabled`,
   `_disabled`, `_required`). A name like `status`/`level`/`priority` must not match.
3. **Explicit boolean default required.** The chain must contain a literal
   `->default(N)` with `N ∈ {0, 1, true, false}`. A *defaultless* flag-named
   column is **skipped** (not converted) — its name alone is too weak: a
   `tinyInteger('is_type')`/`tinyInteger('has_count')` with no default could be
   multi-valued, and converting would silently narrow it. Requiring the 0/1 default
   is the boolean evidence (the source review's column had `->default(1)`).
4. **No `->change()` in the chain** — that ALTERs an existing column's type on a
   migrated table (not a fresh definition); silently changing its declared type is
   out of scope and unsafe.

Even an explicit `0/1` default is not *proof* a flag-named column is boolean (it
could later hold enum-ish values). The strongest possible evidence is the owning
model's `'col' => 'boolean'` cast; verifying that is a heavier, optional gate
(needs table→model resolution) noted in Open Questions. Phase 1's gates make every
ambiguous column a *missed* conversion (safe), never a *wrong* one.

## 3. Rule Design

New rule: `Hihaho\RectorRules\Rector\Migration\FlagColumnToBooleanRector`
(`use ChecksMigrationContext`).

**Node type:** `[Stmt\Expression::class]` — match the column-definition *statement*
and process the whole fluent chain at once. (Matching `MethodCall` and walking
*up* to siblings was the original plan, but **Rector 2.4 has no parent-node
attribute** — `AttributeKey::PARENT_NODE` does not exist and no core rule uses one;
walking *down* from the statement is the supported approach. Validated by
prototype — see Findings / Resolved Questions 1.)

**Match & collect the chain:**

- `isInMigrationsDirectory()` (trait) — else skip.
- `$node->expr` is a `MethodCall`; walk down `->var` collecting every `MethodCall`
  in the chain (outermost → innermost). The **innermost** call (its `->var` is the
  `$table` variable) is the column-type call.
- Config gate: skip entirely unless `confirm_mysql_compatible` is `true` (§2.0).
- Type call name is `tinyInteger` (signed only; `unsignedTinyInteger` excluded), and
  `$this->isObjectType($typeCall->var, new ObjectType(Blueprint::class))` confirms
  the receiver is a Blueprint; skip if the type call's 2nd arg is `true`
  (auto-increment).
- `$typeCall->args[0]->value` is a `String_` literal whose value matches the flag
  pattern (Phase 1 scope; class-constant column names are an extension — see Open
  Questions).
- Scan the collected chain: skip if any call is `->change()` or `->autoIncrement()`;
  require a `->default(N)` with `N ∈ {0,1,true,false}` to be present (skip if absent
  or out of range).

**Rewrite (one pass over the matched statement):**

- Rename the type call's identifier to `boolean` (`$typeCall->name = new Identifier('boolean')`).
- Normalise the default literal in the same chain: `->default(0)` → `->default(false)`,
  `->default(1)` → `->default(true)` (`new ConstFetch(new Name('true'|'false'))`).
  Both edits are trivial here because the walk-down already holds references to the
  type call *and* the `default` call; return the mutated `$node`.
- Preserve all other chain calls (`->nullable()`, `->comment()`, …) untouched.

**Configuration** (`ConfigurableRectorInterface`): `confirm_mysql_compatible`
(bool, default `false` — the rule does nothing until set), `name_prefixes`,
`name_suffixes` (override the defaults above).

## 4. Placement & Registration

- Rule: `src/Rector/Migration/FlagColumnToBooleanRector.php`.
- **Opt-in, NOT in the default `migrations` set.** Registering it in the bundled
  set would make rewriting *every historical migration* a normal `rector process`
  outcome → prod-vs-fresh schema drift at scale (see Resolved Questions 2). Instead,
  the consumer adds it explicitly to their `rector.php` with
  `confirm_mysql_compatible: true`, as a deliberate one-time normalisation. Document
  this prominently; do not add it to `config/sets/migrations.php`.
- Tests: `tests/Rector/Migration/FlagColumnToBooleanRector/` with fixtures under a
  `Fixture/migrations/` subdirectory (so `isInMigrationsDirectory()` passes — mirror
  the existing migration rule tests, which use `namespace migrations;` fixtures).

## 5. Non-Goals

- **Model `$casts`.** Syncing a `'enable_x' => 'boolean'` cast on the model is a
  separate concern (the source review's reviewer only touched the migration). Out of scope
  (though the model cast is the strongest *evidence* a column is boolean — see Open
  Questions 3).
- **Non-MySQL drivers.** On PostgreSQL `tinyInteger`→`smallint` and `boolean` is a
  distinct `boolean` type — the conversion is *not* storage-compatible there. The
  rule is a no-op unless `confirm_mysql_compatible: true` (§2.0).
- **Defaultless flag columns.** Skipped — name alone is insufficient evidence (§2.3).
- **`unsignedTinyInteger`.** Excluded — narrowing its 0-255 range to a signed
  `tinyint(1)` could lose data for a misclassified column (signed `tinyInteger` has
  no such risk).
- Wider integer types (`smallInteger`, `integer`, …), non-flag-named columns,
  auto-increment tinyints, and `->change()` chains.

## Implementation

### Phase 1: Type rename + default + safety gate (Priority: HIGH)

The gate ships with the rewrite — the rule is not viable until the skip fixtures
pass, since they are what prevents a non-boolean `tinyInteger` from being cast.
The prototype confirmed the type rename and the default normalisation happen
together in one walk-down pass, so they are one phase (matching the source review's atomic
change), not two.

- [x] Create `FlagColumnToBooleanRector` in `src/Rector/Migration/` with `use ChecksMigrationContext` — node type `Stmt\Expression`, gated by `isInMigrationsDirectory()`; implements `ConfigurableRectorInterface` and returns early unless `confirm_mysql_compatible === true` (default off).
- [x] Walk down `$node->expr`'s `->var` chain; innermost call = column-type call; requires signed `tinyInteger` (not `unsignedTinyInteger`) + `isObjectType($typeCall->var, Blueprint)`.
- [x] Flag-name gate against configurable prefix/suffix set (`name_prefixes`/`name_suffixes`).
- [x] Chain scan: skip unless a `->default(N∈{0,1,true,false})` is present, no `->change()`, no `->autoIncrement()` and the type-call 2nd arg is not `true`.
- [x] Rename type call to `boolean` and normalise `->default(0)`→`false`/`->default(1)`→`true` in one pass; other chain calls preserved.
- [x] Tests (convert) — `convert_enable` → `boolean('is_published')->default(true)` (an exact real-world case); `convert_nullable` → `boolean('should_loop')->nullable()->default(false)`.
- [x] Tests (skip, blocking) — non-flag name, default(2), defaultless, wider type, `->change()`, auto-increment (2nd-arg + `->autoIncrement()`), non-`String_` name, split form, outside-migrations-dir, and `confirm_mysql_compatible` off (separate disabled test class). All unchanged. (d) `has_count`/`is_type` residual: see Findings — these DO convert under the name gate and are an accepted residual, so no skip fixture asserts otherwise.

### Phase 2: Extensions (Priority: MEDIUM)

- [x] Class-constant column names (`$table->tinyInteger(SomeModel::ENABLE_X)`) — resolved via injected `ValueResolver` (only `String_` and `ClassConstFetch` are accepted; arbitrary variables/method calls are skipped). `convert_constant_name` fixture + `Source/ArticleColumns`.
- [~] Model-cast verification — **deferred (not built)**, see Resolved Questions 5. Disproportionate for an opt-in, MySQL-only, manually-run-and-reviewed normalisation; would require the table→model resolution from the other spec.
- [x] Tests — `convert_constant_name` converts; the variable-named column still skips.

### Phase 3: Docs, checks (Priority: LOW)

- [x] Not added to `config/sets/migrations.php`. Documented in `README.md` as an opt-in, MySQL-only, one-time normalisation (manual `withConfiguredRule` registration, drift caveat, flag-name/default scope).
- [x] Run the completion checks (`pint`, `phpstan`, `pest`, `rector process` self-run) clean.

---

## Open Questions

1. **Confirm hihaho runs MySQL/MariaDB everywhere it matters** (prod, CI, local,
   testing) before setting `confirm_mysql_compatible: true`. The flag prevents
   accidental non-MySQL use, but someone must set it truthfully. (The rule is a safe
   no-op until then.) — adoption-time check, does not block the implementation.

---

## Resolved Questions

1. **How to inspect sibling calls (`->default()`, `->change()`) in the fluent
   chain?** **Decision:** match `Stmt\Expression` and walk *down* `$node->expr`'s
   `->var` chain; do not use a parent-node attribute. **Rationale:** Rector 2.4 has
   no `AttributeKey::PARENT_NODE` (verified — the constant doesn't exist and no core
   rule reads a parent attribute). A throwaway prototype using the walk-down approach
   converted `is_active`/`should_loop`, normalised the default in the same pass
   (incl. a case where `->default()` was not the outermost call), and skipped
   non-flag names, `default(2)`, and `->change()` chains. (The prototype also
   converted a defaultless `has_audio`; the production gate was subsequently
   tightened to *require* a default — see Resolved Questions 4 — so that case now
   skips.)

2. **Historical-migration drift / rollout.** **Decision:** ship the rule **opt-in,
   NOT in the default `migrations` set**; the consumer registers it deliberately as a
   one-time normalisation. **Rationale:** in the bundled set, every `rector process`
   would rewrite all historical migrations, making prod-vs-fresh schema drift a
   routine outcome rather than a conscious decision. Opt-in keeps it explicit.
   (Surfaced by the Codex review of this spec.)

3. **Enforcing the MySQL-only premise.** **Decision:** the rule is a no-op unless
   `confirm_mysql_compatible: true` is configured. **Rationale:** Rector can't
   introspect the app's DB driver, and on Postgres/SQLite the conversion is an
   incompatible type change; a default-off opt-in flag prevents accidental damage.
   (Codex review.)

4. **Defaultless flag columns.** **Decision:** require an explicit
   `->default(0|1|true|false)`; skip defaultless columns. **Rationale:** a flag name
   alone is weak evidence (`has_count`/`is_type` could be multi-valued); the 0/1
   default is the boolean signal, and the source review's column had one. (Codex review.)

## Resolved Questions

5. **Is the flag-name + 0/1-default heuristic enough, or is the model-`boolean`-cast
   gate required?** **Decision:** heuristic is enough; the cast gate is **not built**.
   **Rationale:** the rule is opt-in (`confirm_mysql_compatible`), MySQL-only, kept
   out of the default set, and run as a deliberate one-time normalisation whose diff
   the operator reviews. A flag-prefixed column with a `0/1` default that is secretly
   multi-valued (`has_count`, `is_type`) is a small residual the name gate can't
   exclude — it WILL convert — but the manual-review rollout catches it, and the
   model-cast gate would require the heavy table→model resolution from the
   assert-database spec for marginal benefit. Documented as an accepted residual.

## Findings

- **Phase 1 + 2 implemented; 13 tests pass** (11 default fixtures + 1 constant
  fixture + 1 disabled-config fixture, across two test classes). `convert_enable`
  reproduces the exact real-world result.
- **`ValueResolver` is not on `AbstractRector`** — it must be constructor-injected
  (`Rector\PhpParser\Node\Value\ValueResolver`). Used only to resolve a
  `ClassConstFetch` column name; `String_` is read directly.
- **Column-name resolution is restricted to `String_` + `ClassConstFetch`** (not
  broad `ValueResolver->getValue()`), because the broad call also resolves simple
  local-variable assignments via dataflow — wider than the spec's scope and
  surprising. Variables/method-call names skip.
- **Accepted residual:** a flag-named multi-valued column with a `0/1` default
  (`has_count`) converts; see Resolved Questions 5. No fixture asserts it skips
  (that would be false), and none blesses it as a convert (to avoid implying
  correctness) — it's documented only.
- **Codex review hardened four safety gates:** (1) `confirm_mysql_compatible` is now
  `Assert::boolean` (no `(bool)` cast — `'postgres'` etc. no longer silently enable
  it); (2) chains with ≠1 `->default()` are skipped (a later `->default(2)` could be
  the effective non-boolean value); (3) the auto-increment 2nd-arg guard now skips
  any non-falsy literal (`1` as well as `true`) and unknown args; (4) configured
  `name_prefixes`/`name_suffixes` must be non-empty (`Assert::allStringNotEmpty`) so
  an empty string can't match every column. Regression fixtures added for (2) and (3).
- **Codex re-review caught a follow-on:** a *falsy* 2nd arg (`tinyInteger('x', false)`,
  or named `autoIncrement: false`) was previously kept, emitting `boolean('x', false)`
  — but `boolean()` declares only the column param. **Fix:** require the type call to
  have **exactly one argument** (`count($args) !== 1` → skip); this drops the
  `isFalsyLiteral` path and covers every 2-arg auto-increment form. Regression fixture
  `skip_explicit_no_autoincrement` (positional + named).
- **`unsignedTinyInteger` dropped from scope (final).** Codex flagged that a
  misclassified `unsignedTinyInteger('has_count')->default(1)` would convert to
  `boolean` and lose the 0-255 range (signed `tinyInteger`→`boolean` is
  storage-identical; unsigned is not). Initially kept as an accepted residual, then
  **removed entirely at the user's direction** for maximum safety: `TYPE_METHODS` is
  now `['tinyInteger']`. Signed-only conversion has no range-loss risk, so the residual
  is gone; `unsignedTinyInteger` flags simply stay as-is. Fixture
  `skip_unsigned_tiny_integer` locks this.

<!-- Notes added during implementation. Do not remove this section. -->
