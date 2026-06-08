# Remove Unnecessary Nullsafe Operator

## Overview

A Rector rule that rewrites `$x?->prop` / `$x?->method()` to `$x->prop` /
`$x->method()` when the receiver `$x` can never be `null`. This automates a
recurring human review nit (finding #5 in `docs/review-automation-findings.md`,
seen in real review threads) where reviewers manually flag a nullsafe operator
applied to a value the type system already guarantees is non-null. PHPStan can
*report* this under bleeding-edge; this rule *fixes* it.

---

## 1. Current State

There is no rule for this in `src/Rector/`. Reviewers flag it by hand, e.g.
the source review:

```php
// poster is a non-nullable property, so the nullsafe is noise
- return $this->resource->poster?->original ?? '';
+ return $this->resource->poster->original ?? '';
```

Rector core ships `Rector\CodeQuality\Rector\NullsafeMethodCall\CleanupUnneededNullsafeOperatorRector`
(`vendor/rector/rector/rules/CodeQuality/Rector/NullsafeMethodCall/CleanupUnneededNullsafeOperatorRector.php`),
but it is **too narrow** to cover this:

- It only targets `NullsafeMethodCall` (`?->method()`) — **not** `NullsafePropertyFetch`
  (`?->prop`), which is the source review case.
- It only fires when the receiver `$node->var` is a `FuncCall`, `MethodCall`, or
  `StaticCall` (a *call*), via `ReturnStrictTypeAnalyzer::resolveMethodCallReturnType`.
  It ignores variables and property fetches such as `$this->resource->poster`.

So a complementary rule is warranted: detect non-nullability of *any* receiver
expression via general type resolution, and handle both nullsafe node types.

PHPStan config (`phpstan.neon.dist`) already runs `level: max` + bleedingEdge and
`type_coverage.property: 100`, so declared property nullability is reliable in
this codebase — which keeps the type signal trustworthy (see Open Questions on
phpdoc-only types).

## 2. Rule Design

New rule: `Hihaho\RectorRules\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector`.

**Node types:** `[NullsafePropertyFetch::class, NullsafeMethodCall::class]`.

**Nullability source — the dominant safety decision (resolved; see Resolved
Questions 1).** The rule defaults to **native/certain types only** via
`$this->nodeTypeResolver->getNativeType($node->var)`, *not* `$this->getType()`.
`getType()` trusts phpdoc (`@property`, `@var`); a stale `@property` on a nullable
Eloquent relation would let the rule strip a load-bearing `?->`, and PHPStan would
not catch the result because it trusts the same wrong annotation → a production
null error. Native-only still fixes the motivating case (the source review uses native
property types). Phpdoc-derived non-nullability is **opt-in** via
`ConfigurableRectorInterface` (`trust_phpdoc_types`, default `false`) for codebases
that want to cover Eloquent magic properties and accept the risk. (Confirm the
exact native-type resolver call during implementation; `nodeTypeResolver` is the
autowired entry point used by core rules such as `VariableConstFetchToClassConstFetchRector`.)

**Refactor logic:**

```php
public function refactor(Node $node): ?Node
{
    if (! $node instanceof NullsafePropertyFetch && ! $node instanceof NullsafeMethodCall) {
        return null;
    }

    // Default: native/certain type only. With trust_phpdoc_types = true, use getType().
    $receiverType = $this->trustPhpDocTypes
        ? $this->getType($node->var)
        : $this->nodeTypeResolver->getNativeType($node->var);

    // Only act when the receiver is definitely a non-null object access.
    // containsNull() guards union-with-null; isObject()->yes() guards
    // mixed / error / never / scalar receivers where we must not touch it.
    if (TypeCombinator::containsNull($receiverType)) {
        return null;
    }
    if (! $receiverType->isObject()->yes()) {
        return null;
    }

    if ($node instanceof NullsafePropertyFetch) {
        return new PropertyFetch($node->var, $node->name);
    }

    return new MethodCall($node->var, $node->name, $node->args);
}
```

**Why these guards (safety is the whole game — a wrong removal causes a runtime
NPE that PHPStan won't catch afterward):**

- **Short-circuit invariant.** Removing `?->` is semantics-preserving *precisely
  because* we only remove it when the immediate receiver is provably non-null — so
  this operator never short-circuits in the first place. The `?->` only changes
  behaviour at the moment its receiver is `null`; if that can't happen, `?->` and
  `->` are identical.
- `TypeCombinator::containsNull()` — if the receiver type is `Foo|null`, the
  nullsafe is load-bearing; skip. This also naturally protects chains: in
  `$a?->b?->c`, the receiver of the outer `?->c` is `$a?->b`, whose type includes
  `null` whenever `$a` is nullable, so the outer is left alone. (Chain behaviour is
  *core correctness*, not optional hardening — its fixtures are Phase 1 blockers.)
- `isObject()->yes()` — skip `mixed`, `never`, error types, and any non-object.
  Nullsafe only legitimately applies to object-or-null; if it's not definitely an
  object we cannot prove the operator is redundant.

**Replacement nodes:** `NullsafePropertyFetch` → `PropertyFetch`;
`NullsafeMethodCall` → `MethodCall` (preserving `->name` and `->args`). `->name`
may be an `Expr` (dynamic access, `$obj?->{$name}`) — both target nodes accept an
`Expr` name, so no special handling is needed; lock it with a fixture.

**Empirical validation (done during spec review).** A throwaway prototype of the
above logic (using `getType`) was run via `rector process --dry-run` against four
cases: it converted `$this->resource->poster?->original` (non-null property fetch)
and `$this?->plain()` (non-null `$this`), and left `…->maybePoster?->original` and a
nullable chain untouched. This validates the detection mechanics; the native-type
default above narrows it further toward safety.

## 3. Placement & Registration

Mirror how the Eloquent rules were added this session:

- Rule: `src/Rector/CodeQuality/RemoveUnnecessaryNullsafeOperatorRector.php`
  (new `CodeQuality` category — this is general code quality, not Eloquent).
- Set: `config/sets/code-quality.php` registering the rule.
- `src/Set/HihahoSetList.php`: add `public const string CODE_QUALITY = self::SETS_DIR . 'code-quality.php';`
  (keep the constants alphabetically ordered: `ALL`, `CODE_QUALITY`, `ELOQUENT`, …).
- `config/sets/all.php`: `$rectorConfig->import(__DIR__ . '/code-quality.php');`
  (keep imports alphabetical).
- Tests: `tests/Rector/CodeQuality/RemoveUnnecessaryNullsafeOperatorRector/`
  with `config/configured_rule.php`, a test class, `Source/` model(s), and
  `Fixture/*.php.inc` — same shape as the Eloquent rule tests.

## 4. Non-Goals

- **Never *add* a nullsafe operator.** The reverse direction (the source review wanted
  `?->` added on a nullable receiver) is a correctness change that can mask real
  bugs; leave it to PHPStan's possibly-null reporting. This rule only *removes*.
- Do not touch nullsafe where the receiver type is `mixed`, unknown, or possibly
  null — skipping is always safe; a false removal is not.
- Do not rewrite array/scalar access — out of scope by construction (`isObject`).

## Implementation

### Phase 1: Core rule + safety boundary (Priority: HIGH)

The nullability-source decision and chain semantics are part of this phase — the
rule is **not viable** until both are locked, because they are where the runtime
NPE risk lives. Do not register the rule in any set until every fixture below passes.

- [x] Create `RemoveUnnecessaryNullsafeOperatorRector` in `src/Rector/CodeQuality/` — handles `NullsafePropertyFetch` + `NullsafeMethodCall`, replaces with `PropertyFetch`/`MethodCall` when `! containsNull(receiverType) && receiverType->isObject()->yes()`.
- [x] **Resolve the type from the PHPStan `Scope` directly** — default `$scope->getNativeType($node->var)`; `ConfigurableRectorInterface` with `trust_phpdoc_types` (default `false`) opts into `$scope->getType($node->var)`. **Deviation from spec:** Rector's `$this->getNativeType()`/`$this->getType()` wrappers both DROP `null` from `?Foo` in some cases (unsafe); the raw Scope methods preserve it. See Findings.
- [x] Implement `MinPhpVersionInterface::provideMinPhpVersion()` returning `PhpVersionFeature::NULLSAFE_OPERATOR` — nullsafe is PHP 8.0+ (mirror the core rule).
- [x] Write `getRuleDefinition()` (a `ConfiguredCodeSample`) based on the source review property-fetch example.
- [x] Tests (convert) — (a) `?->prop` on a **native** non-null typed property → converted (the motivating case, multi-hop native — confirms OQ2 positively); (b) `?->method()` on a non-null variable → converted; (c) `$this?->method()` → converted; (d) dynamic name `$obj?->{$name}` on a non-null receiver → converted.
- [x] Tests (skip — safety boundary) — (e) receiver `Foo|null` → skipped (both a nullable property AND a nullable variable method call, per review feedback); (f) `mixed`/untyped receiver → skipped; (g) **phpdoc-only non-null** (`@property Foo $x`) → skipped by default (native → `mixed`), converted with `trust_phpdoc_types: true` (separate test class); (h) covered by (g) — under the native default a stale `@property` resolves to `mixed` and is skipped; (i) already-plain `->` no-change file.
- [x] Tests (chains — core correctness) — (j) `$a?->b?->c` with `$a` nullable → both `?->` preserved; (k) `$nonNull?->maybeNull?->c` → inner removed, outer preserved (load-bearing); (l) full chain on all-non-null receivers → all removed; (m) chain with trailing `?? default` (`$x->y ?? ''`) → coalesce tail preserved.

### Phase 2: Remaining hardening (Priority: MEDIUM)

- [x] Mirror comments from the old node onto the new one (`$this->mirrorComments()`) — `comment_preserved` fixture confirms the comment survives the rewrite.
- [x] Intersection / union-of-objects receiver types (all non-null) → converted (`union_of_objects`, `intersection_objects`); union mixing object + scalar → skipped (`skip_object_or_scalar`).
- [x] Overlap with core `CleanupUnneededNullsafeOperatorRector` (method-call receivers): `call_receiver` fixture (`$this->make()?->caption()`) converts — our rule is a superset and co-exists idempotently.

### Phase 3: Registration, docs, PHPStan alignment (Priority: LOW)

- [x] Add the `CodeQuality` set (`config/sets/code-quality.php`), `HihahoSetList::CODE_QUALITY`, and the import in `config/sets/all.php` (alphabetical).
- [x] Document the rule in `README.md` under a new "Code Quality" set section (table + before/after + scope notes).
- [x] Verified PHPStan reports `nullsafe.neverNull` at `level: max` + bleedingEdge ("Using nullsafe property/method … on non-nullable type") — noted in the README that PHPStan reports and this rule fixes.
- [x] Run the completion checks: `vendor/bin/pint`, `vendor/bin/phpstan analyse`, `vendor/bin/pest`, and `vendor/bin/rector process` (self-run) all clean.

---

## Open Questions

None — both resolved during implementation (see below).

---

## Resolved Questions

1. **Nullability source: native types only, or resolved types including phpdoc?**
   **Decision:** Default to **native/certain types only** (`getNativeType`); make
   phpdoc trust opt-in via `ConfigurableRectorInterface` (`trust_phpdoc_types`,
   default `false`). **Rationale:** the failure mode is asymmetric — a missed
   conversion is harmless, but a wrong removal is a production null error that
   PHPStan cannot catch afterward (it trusts the same annotation the rule trusted).
   Stale `@property` on nullable Eloquent relations is a plausible real-world hazard,
   so phpdoc is not trusted by default. Native typing still covers the motivating
   case (from the PR research). Surfaced by the Codex review of this spec.

2. **Guard against overlap with core `CleanupUnneededNullsafeOperatorRector`?**
   **Decision:** No exclusion needed; document the overlap and add a co-existence
   fixture (Phase 2). **Rationale:** our rule is a superset for method calls on
   call-receivers; both produce the same result, so co-existence is idempotent.

3. **(OQ1) Does PHPStan already report nullsafe-on-non-null?** **Decision/finding:**
   yes — `nullsafe.neverNull` fires at `level: max` + bleedingEdge for both property
   and method access. The rule is the autofix arm of that report; documented in the
   README as complementary.

4. **(OQ2) Type source for nullability.** **Decision:** resolve from the raw PHPStan
   `Scope` — `$scope->getNativeType()` by default, `$scope->getType()` under
   `trust_phpdoc_types`. **Rationale:** Rector's `$this->getNativeType()` and
   `$this->getType()` wrappers both drop `null` from `?Foo` in some cases (unsafe);
   the Scope methods are accurate. `$scope->getNativeType()` resolves the multi-hop
   that shape to non-null (converts) and phpdoc-only to `mixed` (skips), satisfying
   the native-only intent of Resolved Questions 1. See Findings.

## Findings

- **Rector's type-resolution wrappers drop nullability (the key implementation
  finding).** During Phase 1, the spec's chosen `$this->getNativeType($node->var)`
  was found to report a nullable `?Poster` receiver as non-null (`Poster`, not
  `Poster|null`) — which would strip a load-bearing `?->` and cause a runtime null
  error. `$this->getType()` (the other wrapper) *also* drops `null` in some cases
  (e.g. a `?ArticleResource` chain-root parameter). Both convenience wrappers are
  unsafe for this rule. Empirically verified by comparing all sources on the same
  fixtures:

  | receiver | `$scope->getNativeType()` | `$scope->getType()` | `$this->getNativeType()` | `$this->getType()` |
  |----------|---------------------------|----------------------|---------------------------|---------------------|
  | `?Foo`   | `Foo\|null` ✓             | `Foo\|null` ✓        | `Foo` ✗                   | `Foo` ✗ (some cases) |
  | `Foo`    | `Foo` ✓                   | `Foo` ✓              | `Foo` ✓                   | `Foo` ✓             |
  | `@property Foo` (phpdoc-only) | `mixed` (skip) | `Foo` (convert) | `mixed` | `Foo` |

  **Fix:** resolve from the raw PHPStan `Scope` (`$node->getAttribute(AttributeKey::SCOPE)`)
  — `$scope->getNativeType()` by default, `$scope->getType()` under
  `trust_phpdoc_types`. This *keeps the spec's design intent intact* (native-only,
  nullability-correct, phpdoc-only → skip) — only the API changed from the lossy
  wrappers to the accurate Scope methods. The native default also resolves
  phpdoc-only/stale `@property` to `mixed` → skipped, which is precisely the
  anti-stale-phpdoc safety the spec wanted (Resolved Questions 1).

- **OQ2 resolved positively:** `$scope->getNativeType()` resolves the multi-hop
  `$resource->poster` (that shape) to a non-null `Poster` when both hops are
  natively typed → the motivating case converts.

- Phase 1: 14 tests pass (13 default fixtures + 1 trust-mode fixture, across two
  test classes). The hardest case `$resource?->maybePoster?->original` correctly
  becomes `$resource->maybePoster?->original` (inner removed, outer kept).
