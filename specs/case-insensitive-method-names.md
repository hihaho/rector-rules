# Case-insensitive method-name comparisons

## Overview

PHP method names are case-insensitive, but six code paths across five rules compare a
method name with an exact `toString()` check, so they silently skip valid mixed-case
call sites (`Route::GET()`, `->After()`, `static::Observe()`, `$table->TinyInteger()`).
This is the package's own documented rule (`CLAUDE.md`, "Gate cheaply, resolve names
once"). This change makes those six comparisons case-insensitive and adds regression
fixtures. Five sites are false-negative fixes (missed transforms); one
(`FlagColumnToBooleanRector`'s `->Change()`/`->autoIncrement()` skip guard) is a
*correctness* fix — a mixed-case spelling there would let the rule wrongly convert a
column-modifying migration.

## Assumptions

<!-- One bullet per AI-introduced inference; sign off by skimming this section. -->

- **Scope is six method-name comparisons across five rules.** An *exhaustive* sweep of
  `src/` (every `->toString()` that feeds a comparison or `in_array`, across all
  variable spellings) found these six method-name sites: `ObservedByAttributeRector:146`,
  `RemoveAfterColumnPositioningRector:55`, `ChecksRouteContext:34` & `:46`, and
  `FlagColumnToBooleanRector:164` & `:218`(→`:220`/`:224`). Earlier drafts undercounted
  twice (the first missed `ChecksRouteContext`, the second missed
  `FlagColumnToBooleanRector`) because the grep keyed on specific variable names; the
  list above is the verified-complete set — see Resolved Questions #2.
- **Constant/property/`::class` comparisons are deliberately excluded.**
  `RelationNameToClassConstantRector:416` and `InlineMigrationConstantsRector:69` compare
  *constant* names (case-sensitive in PHP — correct as-is); `AssertModelExistsRector:176`
  compares a *property* name (case-sensitive — correct); the two `::class` checks and the
  `AddResourceSuffixRector`/`AbstractAddSuffixRector` class-name-suffix reads are not
  method-call gates. `AssertDatabaseTableToModelClassRector:164` already uses
  `strtolower` (the correct example). None of these change.
- **Fix form = `strcasecmp(...) !== 0` / `strtolower(...)`.** Matches the form the
  codebase already uses (`ChecksRouteContext.php:65` for the class name, and
  `AssertDatabaseTableToModelClassRector:164` for a method name). Behaviour-identical for
  the existing lowercase inputs.
- **Routing callers already pass lowercase literals.** `ROUTE_METHODS` is all
  lowercase and `isRouteStaticCall($node, 'group')` passes lowercase, so only the AST
  side needs lowercasing. `FlagColumnToBooleanRector`'s literals are *camelCase*
  (`tinyInteger`, `autoIncrement`), so those need both sides normalised (see §2).

---

## 1. Current State

All at commit `a4c3b32`. The six method-name comparisons to fix (across five rules):

- `src/Rector/Eloquent/ObservedByAttributeRector.php:146` — `$call->name->toString()
  !== 'observe'` (a `StaticCall`). Note line 142 already lowercases the *class* name —
  the method check is simply inconsistent.
- `src/Rector/Migration/RemoveAfterColumnPositioningRector.php:55` — `$node->name->toString()
  !== 'after'` (a `MethodCall`).
- `src/Rector/Routing/Concerns/ChecksRouteContext.php:34` — `$node->name->toString()
  !== $method` (used by `isRouteStaticCall`, e.g. `'group'`).
- `src/Rector/Routing/Concerns/ChecksRouteContext.php:46` — `! in_array($node->name->toString(),
  $methods, true)` (used by `isRouteStaticCallForMethods` with the lowercase
  `NormalizeRoutePathRector::ROUTE_METHODS`).
- `src/Rector/Migration/FlagColumnToBooleanRector.php:164` — `! in_array($typeCall->name->toString(),
  self::TYPE_METHODS, true)`, where `TYPE_METHODS = ['tinyInteger']` (camelCase). A
  `$table->TinyInteger(...)` call is missed → missed transform.
- `src/Rector/Migration/FlagColumnToBooleanRector.php:218` — `$name = $call->name->toString();`
  then `:220` `if ($name === 'change' || $name === 'autoIncrement')` and `:224`
  `if ($name === 'default')`. **The `:220` check is a *skip guard*** — a mixed-case
  `->Change()` / `->AutoIncrement()` is not matched, so the rule fails to skip and may
  **wrongly convert** a column-modifying migration. This site is therefore a
  correctness fix (prevents a bad transform), not only a missed-transform fix.

`ChecksRouteContext.php:65` already compares the *class* name case-insensitively
(`strcasecmp(...) === 0`, with a comment about PHP class names), and
`AssertDatabaseTableToModelClassRector:164` already does `in_array(strtolower($methodName),
…)` — the in-file precedents the author applied elsewhere but missed at the six sites
above.

**Out of scope — do NOT change:**

- `ObservedByAttributeRector.php:156` and `AssertModelExistsRector.php:149` —
  `!== 'class'` matches the `::class` magic constant. (Technically `Foo::CLASS` is also
  valid PHP and would be skipped, but that spelling is vanishingly rare and
  formatter-normalised — not worth touching.)
- `AssertModelExistsRector.php:176` — `!== 'id'` matches a **property** name
  (`$model->id`). PHP property names ARE case-sensitive, so the exact check is correct.
- `RelationNameToClassConstantRector:416`, `InlineMigrationConstantsRector:69` — *constant*
  names (`hasConstant()` is case-sensitive). Correct as-is.

## 2. Proposed Changes

| File:line | From | To |
|-----------|------|----|
| `ObservedByAttributeRector.php:146` | `$call->name->toString() !== 'observe'` | `strcasecmp($call->name->toString(), 'observe') !== 0` |
| `RemoveAfterColumnPositioningRector.php:55` | `$node->name->toString() !== 'after'` | `strcasecmp($node->name->toString(), 'after') !== 0` |
| `ChecksRouteContext.php:34` | `$node->name->toString() !== $method` | `strcasecmp($node->name->toString(), $method) !== 0` |
| `ChecksRouteContext.php:46` | `! in_array($node->name->toString(), $methods, true)` | `! in_array(strtolower($node->name->toString()), $methods, true)` |
| `FlagColumnToBooleanRector.php:63` | `private const array TYPE_METHODS = ['tinyInteger'];` | `private const array TYPE_METHODS = ['tinyinteger'];` (lowercase the values, since the gate below now lowercases its input; the const is private and used only at :164) |
| `FlagColumnToBooleanRector.php:164` | `! in_array($typeCall->name->toString(), self::TYPE_METHODS, true)` | `! in_array(strtolower($typeCall->name->toString()), self::TYPE_METHODS, true)` |
| `FlagColumnToBooleanRector.php:218` | `$name = $call->name->toString();` | `$name = strtolower($call->name->toString());` |
| `FlagColumnToBooleanRector.php:220` | `if ($name === 'change' \|\| $name === 'autoIncrement')` | `if ($name === 'change' \|\| $name === 'autoincrement')` (compare to lowercased literals, since `$name` is now lowercased) |
| `FlagColumnToBooleanRector.php:224` | `if ($name === 'default')` | unchanged (`'default'` is already lowercase; `$name` is now lowercased) |

For the FlagColumn `:63`/`:220` edits, the literals must be lowercased to match the now-lowercased input — do NOT leave `'tinyInteger'` / `'autoIncrement'` camelCase, or the comparison can never be true. Leave every surrounding `instanceof Identifier` guard, the explanatory comments, and the `:224` `'default'` literal intact.

## Edge Cases

| Scenario | Handling |
|----------|----------|
| `static::Observe(Foo::class)` in `booted()` | Now matched → `#[ObservedBy(Foo::class)]` added. Phase 2 fixture `converts_mixed_case_observe.php.inc`. |
| `$table->string('x')->After('y')` in a migration | Now matched → `->After('y')` removed. Phase 2 fixture `remove_mixed_case_after.php.inc`. |
| `Route::GET('/path/', ...)` in a routes file | Now matched → path normalised by `NormalizeRoutePathRector`. Phase 2 fixture `mixed_case_verb.php.inc`. |
| `Route::GROUP([...])` in a routes file | Now matched → converted by `RouteGroupArrayToMethodsRector`. Phase 2 fixture `mixed_case_group.php.inc`. |
| `$table->TinyInteger('is_x')->Default(false)` in a migration | Now matched → converted to `boolean('is_x')->Default(false)`. Phase 2 fixture `convert_mixed_case_type.php.inc`. |
| `$table->tinyInteger('is_x')->Change()->default(false)` (mixed-case skip guard) | Still **skipped** — the `->Change()` guard now matches case-insensitively, preventing a wrong conversion of a column-modifying migration. Phase 2 fixture `skip_mixed_case_change.php.inc`. |
| Existing lowercase calls (`observe`, `after`, `get`, `group`, `tinyInteger`, `default`) | Unchanged — `strcasecmp`/`strtolower` is behaviour-identical for them. All existing fixtures stay green. |
| `Foo::CLASS` / `$model->ID` | Out of scope — `::class` is formatter-normalised and rare; property names are correctly case-sensitive. Not touched. |

## Implementation

### Phase 1: Fix the six comparisons (Priority: HIGH)

- [x] `ObservedByAttributeRector.php:146` — case-insensitive `observe`.
- [x] `RemoveAfterColumnPositioningRector.php:55` — case-insensitive `after`.
- [x] `ChecksRouteContext.php:34` and `:46` — case-insensitive `$method` / `$methods`.
- [x] `FlagColumnToBooleanRector.php:63/164/218/220` — lowercase `TYPE_METHODS`, lowercase
      the `:164` and `:218` inputs, and lowercase the `:220` literals (`'autoincrement'`).
      Confirm `TYPE_METHODS` has no other references (verified: only `:164`).
- [x] Tests — confirm the existing suites for all five rules
      (`ObservedByAttributeRector`, `RemoveAfterColumnPositioningRector`,
      `NormalizeRoutePathRector`, `RouteGroupArrayToMethodsRector`,
      `FlagColumnToBooleanRector`) still pass unchanged.

### Phase 2: Regression fixtures (Priority: HIGH)

- [x] `tests/Rector/Eloquent/ObservedByAttributeRector/Fixture/converts_mixed_case_observe.php.inc`
      — mirror the existing `converts_static_observe.php.inc` but spell the call
      `static::Observe(...)`; "after" half identical to the lowercase fixture's.
- [x] `tests/Rector/Migration/RemoveAfterColumnPositioningRector/Fixture/migrations/remove_mixed_case_after.php.inc`
      — mirror `remove_after.php.inc` with `->After(...)`.
- [x] `tests/Rector/Routing/NormalizeRoutePathRector/Fixture/routes/mixed_case_verb.php.inc`
      — mirror a path-normalising fixture with an uppercase verb (`Route::GET('/path/', …)`).
- [x] `tests/Rector/Routing/RouteGroupArrayToMethodsRector/Fixture/routes/mixed_case_group.php.inc`
      — mirror a `Route::group([...])` fixture with `Route::GROUP([...])`.
- [x] `tests/Rector/Migration/FlagColumnToBooleanRector/Fixture/migrations/convert_mixed_case_type.php.inc`
      — mirror `convert_bool_default.php.inc` but spell `$table->TinyInteger('is_featured')->Default(false)`;
      "after" half is the rule's actual output (`boolean('is_featured')->Default(false)` —
      the rule renames the type call, not the `default` call). Proves `:164` + `:224`.
- [x] `tests/Rector/Migration/FlagColumnToBooleanRector/Fixture/migrations/skip_mixed_case_change.php.inc`
      — mirror `skip_change.php.inc` but spell `->Change()`; it must remain a **skip**
      (no `-----`/transform). Proves the `:220` correctness guard now matches mixed case.
- [x] Tests — run each rule's suite; for the routing and FlagColumn transform fixtures,
      let the test reveal the rule's exact output and match the "after" half to it. If a
      fixture that should change does NOT (or a skip fixture transforms), STOP and report.

### Phase 3: Verification (Priority: HIGH)

- [x] `vendor/bin/pest` — full suite green, 6 new fixtures present.
- [x] `vendor/bin/phpstan analyse --memory-limit=2G` — `errors:0`.
- [x] `vendor/bin/rector process --dry-run` — `changed_files:0` (0 files would change).
- [x] Regression sweep — none of the six fixed sites retains a case-sensitive method
      comparison: `command grep -rn "toString() !== 'observe'\|toString() !== 'after'\|toString() !== \$method\|in_array(\$node->name->toString()\|in_array(\$typeCall->name->toString()" src/Rector/`
      returns nothing, and `command grep -n "=== 'autoIncrement'" src/Rector/Migration/FlagColumnToBooleanRector.php`
      returns nothing (camelCase literal gone).
- [x] `AssertModelExistsRector.php:176` (the `id` property check) and the two `::class`
      checks are unmodified (`git diff` shows no edit there).

---

## Open Questions

None.

---

## Resolved Questions

1. **Should the routing trait (`ChecksRouteContext`) be in scope, or only the two
   originally-found rules?** **Decision:** In scope. **Rationale:** A sweep found
   the identical case-sensitive comparison at `ChecksRouteContext.php:34` and `:46`,
   relied on by `NormalizeRoutePathRector` and `RouteGroupArrayToMethodsRector`.
   Fragmenting one bug class across separate efforts is worse than a single complete
   fix; the original 2-rule framing was an artifact of a grep that missed the
   `!== $method` / `in_array(...)` forms.

2. **Is the scope now complete, after two undercounts?** **Decision:** Yes — six sites
   across five rules (see Assumptions). **Rationale:** A Codex review of this spec
   surfaced `FlagColumnToBooleanRector` (which the second draft still missed), prompting
   an *exhaustive* re-sweep of every `->toString()` in `src/` that feeds a comparison or
   `in_array`, across all variable spellings (`$node->name`, `$call->name`,
   `$typeCall->name`, and intermediate `$name = …->toString()`). That sweep was
   classified site-by-site: six are method-name gates (fixed here); the rest are
   constant-name, property-name, `::class`, class-name-suffix, or import-alias reads that
   are correctly case-sensitive or not method-call gates. `FlagColumnToBooleanRector:220`
   in particular is a *correctness* fix — a mixed-case `->Change()` would otherwise slip
   the skip guard and let the rule wrongly convert a column-modifying migration.

---

## Findings

- **All six edits applied at the spec's exact line numbers** — the five rule files
  were untouched by the 0.8.0/0.9.0 releases, so no line drift. All 51 pre-existing
  fixtures across the five suites stay green (`strcasecmp`/`strtolower` is
  behaviour-identical for the existing lowercase inputs).
- **ObservedBy fixtures must use the class name `Article`.** `ObservedByAttributeRector`
  gates on `isEloquentModel()`, which calls `reflectionProvider->isSubclassOfClass(Model)`.
  In the rector test harness only the established fixture class name `Article` resolves
  as a `Model` subclass; a novel class name (`MixedCaseObserveArticleV2`) returns
  `isModel=false`, so the rule silently skips and the fixture reads as "unchanged".
  The mixed-case fixture therefore reuses `class Article extends Model` like every other
  transform fixture. (The rule itself is correct — a direct `rector process` run on the
  novel-named class transforms it fine; this is a harness-reflection constraint, not a
  rule bug.)
- **Clear `.cache/rector` after editing rule logic.** Rector's per-file cache keys on
  file content + config + version, never the rule's source, so the shared `.cache/rector`
  serves stale "no change" results for fixtures after a rule edit. Cleared before each
  verification run.
