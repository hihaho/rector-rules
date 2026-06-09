# ObservedByAttributeRector

## Overview

Replaces the `booted()` pattern for registering a single observer
(`static::observe(SomeObserver::class)`) with the `#[ObservedBy(SomeObserver::class)]`
PHP attribute introduced in Laravel 11. The method is removed entirely when it
contains only that one statement.

## Assumptions

<!-- Audit ledger — one bullet per AI-introduced inference. Sign off by skimming this section. -->

- **Node type = `Class_`.** The rule visits the class, inspects its `booted()`
  method, and both adds the attribute to the class and removes the method in a
  single pass. AI-chosen — see Resolved #1.
- **Single-observe-only guard.** Only fires when `booted()` contains exactly one
  statement and that statement is a bare `static::observe(X::class)` or
  `self::observe(X::class)` static call. All other `booted()` bodies (event
  bindings, scope registrations, multiple statements) are left untouched.
  AI-chosen; see Resolved #2.
- **Model-inheritance guard.** Uses PHPStan `ClassReflection` to verify the
  class is `Illuminate\Database\Eloquent\Model` or a subclass before firing.
  AI-chosen; see Resolved #3.
- **Idempotent: existing `#[ObservedBy]` blocks the rule.** Detected via
  `PhpAttributeAnalyzer::hasPhpAttribute($class, 'ObservedBy')`. AI-chosen.
- **`::class` constant-fetch arg only.** The `observe()` argument must be a
  `ClassConstFetch` whose `name` is the identifier `class`. String-literal
  arguments (`static::observe('ArticleObserver')`) are left alone.
  AI-chosen; see Resolved #4.
- **Category = `Eloquent`.** AI-chosen; consistent with existing rules in the
  package targeting Eloquent model patterns.
- **Attribute is added as the *first* attr group** (prepended, not appended).
  AI-chosen so that when a model already has `#[CollectedBy]` or
  `#[UseEloquentBuilder]` the new attribute sits on its own line and doesn't
  disrupt those.

---

## 1. Architecture

Single rule `src/Rector/Eloquent/ObservedByAttributeRector.php`.
It visits `Class_` nodes, inspects each class, and either adds the attribute +
removes the method or leaves the class untouched.

Dependencies injected via constructor:
- `PhpAttributeAnalyzer` — to check whether `#[ObservedBy]` is already present.
- `ReflectionProvider` — to verify the class extends `Model`.

No shared trait needed (this rule is self-contained).

### Node path

```
Class_
  attrGroups   ← new AttributeGroup prepended here
  stmts[]
    ClassMethod(name="booted", static, protected)
      stmts[0]  ← Expression(StaticCall(class="static"|"self", method="observe", args[ClassConstFetch(name="class")]))
```

### Attribute construction

```php
use PhpParser\Node\Arg;
use PhpParser\Node\Attribute;
use PhpParser\Node\AttributeGroup;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name\FullyQualified;

// $observerFqcn = 'App\Observers\ArticleObserver'
$attrArg = new Arg(new ClassConstFetch(new FullyQualified($observerFqcn), new Identifier('class')));
$attrGroup = new AttributeGroup([
    new Attribute(new FullyQualified('Illuminate\Database\Eloquent\Attributes\ObservedBy'), [$attrArg]),
]);
array_unshift($class->attrGroups, $attrGroup);
```

Using `FullyQualified` lets Rector's printer emit the short form and add the
`use` import automatically, matching what it does in `RelationNameToClassConstantRector`.

### Method removal

```php
foreach ($class->stmts as $key => $stmt) {
    if ($stmt instanceof ClassMethod && $this->isName($stmt, 'booted')) {
        unset($class->stmts[$key]);
        break;
    }
}
```

### `booted()` shape check

```php
private function resolveObserverFqcn(ClassMethod $method): ?string
{
    // Must have exactly one statement
    if (count($method->stmts) !== 1) {
        return null;
    }

    $stmt = $method->stmts[0];
    if (!$stmt instanceof Expression || !$stmt->expr instanceof StaticCall) {
        return null;
    }

    $call = $stmt->expr;

    // Must be static:: or self::
    if (!$call->class instanceof Name) {
        return null;
    }
    $className = strtolower($call->class->toString());
    if (!in_array($className, ['static', 'self'], true)) {
        return null;
    }

    // Must be ->observe(...)
    if (!$call->name instanceof Identifier || $call->name->toString() !== 'observe') {
        return null;
    }

    // Must have exactly one arg: SomeClass::class
    $args = $call->getArgs();
    if (count($args) !== 1 || !$args[0]->value instanceof ClassConstFetch) {
        return null;
    }

    $constFetch = $args[0]->value;
    if (!$constFetch->name instanceof Identifier || $constFetch->name->toString() !== 'class') {
        return null;
    }

    // Resolve the FQCN of the observer class
    return $this->getName($constFetch->class);
}
```

### Model-inheritance check

```php
private function isEloquentModel(Class_ $class): bool
{
    $className = $this->getName($class);
    if ($className === null || !$this->reflectionProvider->hasClass($className)) {
        return false;
    }

    $reflection = $this->reflectionProvider->getClass($className);
    return $reflection->isSubclassOf('Illuminate\Database\Eloquent\Model')
        || $reflection->getName() === 'Illuminate\Database\Eloquent\Model';
}
```

## 2. Rule definition

```php
public function getRuleDefinition(): RuleDefinition
{
    return new RuleDefinition(
        'Replace booted() observer registration with the #[ObservedBy] attribute',
        [
            new CodeSample(
                <<<'CODE_SAMPLE'
use App\Observers\ArticleObserver;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected static function booted(): void
    {
        static::observe(ArticleObserver::class);
    }
}
CODE_SAMPLE,
                <<<'CODE_SAMPLE'
use App\Observers\ArticleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(ArticleObserver::class)]
class Article extends Model
{
}
CODE_SAMPLE,
            ),
        ],
    );
}
```

## Edge Cases

| Scenario | Handling |
|----------|----------|
| `booted()` has only `static::observe(ArticleObserver::class)` | Fire: add attribute, remove method. Tests Phase 1. |
| `booted()` has `static::observe(X::class)` plus another statement | Skip — `count($method->stmts) !== 1` guard. Tests Phase 1. |
| `booted()` calls `self::observe(ArticleObserver::class)` | Fire — `self::` is also matched. Tests Phase 1. |
| `observe()` receives a string literal, not `::class` | Skip — `ClassConstFetch` guard fails. Tests Phase 1. |
| Class already has `#[ObservedBy(ArticleObserver::class)]` | Skip — idempotent via `hasPhpAttribute`. Tests Phase 1. |
| Class does not extend `Model` | Skip — inheritance guard. Tests Phase 1. |
| Class extends `Model` indirectly (via intermediate base) | Fire — `isSubclassOf` covers deep inheritance. Tests Phase 1. |
| `booted()` absent entirely | Skip — no matching method found. Tests Phase 1. |
| Class already has other attr groups (`#[CollectedBy]`, `#[UseEloquentBuilder]`) | Fire — attribute is prepended, existing groups preserved. Tests Phase 1. |
| Anonymous class | Skip — `$this->getName($class)` returns null → reflection guard exits. Tests Phase 1. |

## Implementation

### Phase 1: Rule + tests (Priority: HIGH)

- [x] Add `src/Rector/Eloquent/ObservedByAttributeRector.php` — inject `PhpAttributeAnalyzer` and `ReflectionProvider`, implement `getNodeTypes(): [Class_::class]`, implement `refactor()` as described above.
- [x] `refactor()` flow: find `booted()` → `resolveObserverFqcn()` → inheritance guard → idempotency guard → prepend `AttributeGroup` → unset `booted()` from stmts → return `$node`.
- [x] Add fixtures under `tests/Rector/Eloquent/ObservedByAttributeRector/Fixture/`:
  - `converts_static_observe.php.inc` — `static::observe(ArticleObserver::class)` → attribute.
  - `converts_self_observe.php.inc` — `self::observe(...)` → attribute.
  - `preserves_existing_attr_groups.php.inc` — class already has `#[CollectedBy]`; ObservedBy prepended.
  - `skip_multi_statement_booted.php.inc` — `booted()` has two statements; no change.
  - `skip_string_literal_arg.php.inc` — `observe('ArticleObserver')`; no change.
  - `skip_already_has_attribute.php.inc` — already `#[ObservedBy]`; no change (idempotent).
  - `skip_non_model_class.php.inc` — class not extending Model; no change.
  - `skip_no_booted_method.php.inc` — class has no `booted()`; no change.
  - `converts_indirect_model.php.inc` — class extends intermediate base that extends Model; fires correctly.
  - `skip_anonymous_class.php.inc` — anonymous class; no change.
- [x] Add `tests/Rector/Eloquent/ObservedByAttributeRector/config/configured_rule.php` — mirrors existing Eloquent rule configs.
- [x] Add `tests/Rector/Eloquent/ObservedByAttributeRector/ObservedByAttributeRectorTest.php` — mirrors `RelationNameToClassConstantRectorTest`.
- [x] Add source models under `tests/Rector/Eloquent/ObservedByAttributeRector/Source/` for the model base class used in fixtures.
- [x] Register the rule in `config/sets/eloquent.php` — add `ObservedByAttributeRector::class` to the `$rectorConfig->rules([...])` array, mirroring the existing entries.
- [x] Run `vendor/bin/pest tests/Rector/Eloquent/ObservedByAttributeRector` to confirm green.

### Phase 2: Quality + docs (Priority: MEDIUM)

- [x] Run full `vendor/bin/pest` suite — no regressions.
- [x] Delegate to `backend-quality` skill for Pint + PHPStan.
- [x] Update `README.md` with a rule entry consistent with existing Eloquent rule entries (only if README lists rules individually — verify first).

---

## Open Questions

None.

---

<!-- ## Resolved Questions
1. **Why visit `Class_` and not `ClassMethod`?** **Decision:** Visit `Class_`.
   **Rationale:** Adding the attribute *and* removing the method both require the
   parent `Class_` node. Visiting `ClassMethod` alone would require `NodeFinder`
   to reach back up to the class — an awkward second traversal. Visiting `Class_`
   is natural because `refactor()` needs to mutate both `$class->attrGroups` and
   `$class->stmts`. Cost is low: the check fails fast when `booted()` is absent.

2. **Why single-observe-only?** **Decision:** Skip when `booted()` has more than
   one statement. **Rationale:** Multi-statement `booted()` bodies mix observer
   registration with other bootstrap logic (event listeners, scope bindings). A
   Rector rule should not try to split those out — the developer must decide which
   parts stay in `booted()`. Single-statement is safe and mechanical.

3. **Why Model-inheritance guard?** **Decision:** Require the class to extend
   `Illuminate\Database\Eloquent\Model`. **Rationale:** `observe()` and
   `#[ObservedBy]` are Eloquent-specific. A non-model class that happens to define
   `booted()` and call something named `observe()` should not be touched.

4. **Why `::class` only, no string literals?** **Decision:** Skip `string` args.
   **Rationale:** String observer registration (`observe('ArticleObserver')`) is
   unusual and may rely on namespace resolution or aliasing that the rule can't
   safely reproduce. `::class` is the standard pattern and the only one this rule targets.
-->

## Findings

- PHPStan's node scope resolver wraps anonymous class `Class_` nodes as `PHPStan\Node\AnonymousClassNode`, which assigns a synthetic name (`AnonymousClass<hash>`) — so `$node->name === null` is false even for anonymous classes. The correct guard is `$node->isAnonymous()`, which `AnonymousClassNode` overrides to return `true`.
- `isSubclassOf(string)` was replaced with `isSubclassOfClass(ClassReflection)` to match the Rector 2.x API; the string-based overload does not exist in the version range this package targets.
- Rector's `importNames()` prepends new `use` statements at the top of the existing use block, not alphabetically. Fixture expected outputs were written accordingly.
