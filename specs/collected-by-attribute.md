# CollectedByAttributeRector

## Overview

Replaces the `newCollection()` override pattern (used to return a custom
Eloquent collection class) with the `#[CollectedBy(CustomCollection::class)]`
PHP attribute introduced in Laravel 11. The override method is removed entirely
when it contains only a trivial `return new CustomCollection($models)` body.

## Assumptions

<!-- Audit ledger — one bullet per AI-introduced inference. Sign off by skimming this section. -->

- **Node type = `Class_`.** The rule visits the class, finds `newCollection()`,
  and both adds the attribute and removes the method in one pass. AI-chosen —
  same rationale as `ObservedByAttributeRector`: both mutations need the parent
  `Class_` node. See Resolved #1.
- **Trivial-body guard.** Only fires when the `newCollection()` method body
  is exactly one statement: `return new SomeCollection($models)`, where `$models`
  is the method's first parameter. AI-chosen; see Resolved #2.
- **Return-type as collection class.** The collection FQCN is taken from the
  method's return type declaration (a `FullyQualified` or importable name). If
  the return type is absent, nullable, or a union, the rule skips. AI-chosen;
  see Resolved #3.
- **Model-inheritance guard.** Same PHPStan check as `ObservedByAttributeRector`.
  AI-chosen.
- **Idempotent: existing `#[CollectedBy]` blocks the rule.** Detected via
  `PhpAttributeAnalyzer::hasPhpAttribute($class, 'CollectedBy')`. AI-chosen.
- **Attribute prepended** (same placement policy as `ObservedByAttributeRector`).
  AI-chosen.
- **Category = `Eloquent`.** AI-chosen; consistent with existing rules.
- **Return-type body cross-check.** If the return type names class `Foo` but
  `new Bar(...)` is constructed, the rule skips. AI-chosen safety guard.

---

## 1. Architecture

Single rule `src/Rector/Eloquent/CollectedByAttributeRector.php`.
Same dependencies as `ObservedByAttributeRector`:
- `PhpAttributeAnalyzer` — idempotency check.
- `ReflectionProvider` — Model-inheritance guard.

### Node path

```
Class_
  attrGroups   ← new AttributeGroup prepended here
  stmts[]
    ClassMethod(name="newCollection", public)
      params[0]  Variable("models"), default=[]
      returnType ← used to resolve collection FQCN
      stmts[0]  Return_(New_(collectionClass, [arg($models)]))
```

### `newCollection()` shape check

```php
private function resolveCollectionFqcn(ClassMethod $method): ?string
{
    // Must have exactly one statement
    if (count($method->stmts ?? []) !== 1) {
        return null;
    }

    $stmt = $method->stmts[0];
    if (!$stmt instanceof Return_ || !$stmt->expr instanceof New_) {
        return null;
    }

    $new = $stmt->expr;

    // The constructed class must match the declared return type.
    // $this->getName() resolves Name/FullyQualified nodes to their FQCN;
    // it returns null for NullableType, UnionType, etc. — those skip cleanly.
    $returnTypeFqcn  = $this->getName($method->returnType);
    $constructedFqcn = $this->getName($new->class);
    if ($returnTypeFqcn === null || $constructedFqcn === null) {
        return null;
    }
    if ($returnTypeFqcn !== $constructedFqcn) {
        return null;
    }

    // Constructor arg must be the method's first parameter
    $args = $new->getArgs();
    if (count($args) !== 1) {
        return null;
    }
    $paramName = $this->getName($method->params[0] ?? null);
    if ($paramName === null || !$args[0]->value instanceof Variable) {
        return null;
    }
    if ($this->getName($args[0]->value) !== $paramName) {
        return null;
    }

    return $returnTypeFqcn;
}
```

`resolveFullyQualifiedName()` uses `$this->getName()` which resolves imported
names to their FQCN via Rector's name resolver — same approach used across the
existing Eloquent rules.

### Attribute construction

Identical pattern to `ObservedByAttributeRector`, pointing at
`Illuminate\Database\Eloquent\Attributes\CollectedBy`.

```php
$attrArg = new Arg(new ClassConstFetch(new FullyQualified($collectionFqcn), new Identifier('class')));
$attrGroup = new AttributeGroup([
    new Attribute(new FullyQualified('Illuminate\Database\Eloquent\Attributes\CollectedBy'), [$attrArg]),
]);
array_unshift($class->attrGroups, $attrGroup);
```

## 2. Rule definition

```php
public function getRuleDefinition(): RuleDefinition
{
    return new RuleDefinition(
        'Replace newCollection() override with the #[CollectedBy] attribute',
        [
            new CodeSample(
                <<<'CODE_SAMPLE'
use App\Collections\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @param self[] $models */
    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}
CODE_SAMPLE,
                <<<'CODE_SAMPLE'
use App\Collections\ArticleCollection;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Model;

#[CollectedBy(ArticleCollection::class)]
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
| Trivial `return new ArticleCollection($models)` body | Fire: add attribute, remove method. Tests Phase 1. |
| `newCollection()` body has additional logic | Skip — `count($method->stmts) !== 1` guard. Tests Phase 1. |
| Return type is nullable (`?ArticleCollection`) | Skip — nullable type is not a simple `Name`/`FullyQualified`. Tests Phase 1. |
| Return type is absent | Skip — `$returnTypeFqcn` is null. Tests Phase 1. |
| Constructed class differs from return type | Skip — cross-check fails. Tests Phase 1. |
| Class already has `#[CollectedBy]` | Skip — idempotent check. Tests Phase 1. |
| Class does not extend `Model` | Skip — inheritance guard. Tests Phase 1. |
| Class already has other attr groups (`#[ObservedBy]`, `#[UseEloquentBuilder]`) | Fire — attribute prepended, existing groups preserved. Tests Phase 1. |
| Constructor receives more than `$models` | Skip — `count($args) !== 1` guard. Tests Phase 1. |
| Anonymous class | Skip — reflection guard exits on null name. Tests Phase 1. |

## Implementation

### Phase 1: Rule + tests (Priority: HIGH)

- [x] Add `src/Rector/Eloquent/CollectedByAttributeRector.php` — inject `PhpAttributeAnalyzer` and `ReflectionProvider`, visit `Class_`, implement `resolveCollectionFqcn()` and `refactor()` as described.
- [x] `refactor()` flow: find `newCollection()` method → `resolveCollectionFqcn()` → inheritance guard → idempotency guard → prepend `AttributeGroup` → unset `newCollection()` from stmts → return `$node`.
- [x] Add fixtures under `tests/Rector/Eloquent/CollectedByAttributeRector/Fixture/`:
  - `converts_new_collection.php.inc` — trivial body → attribute.
  - `preserves_existing_attr_groups.php.inc` — class already has `#[ObservedBy]`; CollectedBy prepended.
  - `skip_custom_body.php.inc` — body has extra logic; no change.
  - `skip_nullable_return_type.php.inc` — `?ArticleCollection` return; no change.
  - `skip_no_return_type.php.inc` — missing return type; no change.
  - `skip_mismatched_class.php.inc` — constructs `FooCollection` but returns `BarCollection`; no change.
  - `skip_already_has_attribute.php.inc` — idempotent.
  - `skip_non_model_class.php.inc` — not extending Model; no change.
  - `skip_extra_constructor_args.php.inc` — `new ArticleCollection($models, $extra)` with >1 arg; no change.
  - `skip_anonymous_class.php.inc` — anonymous class; no change.
- [x] Add `tests/Rector/Eloquent/CollectedByAttributeRector/config/configured_rule.php`.
- [x] Add source models under `tests/Rector/Eloquent/CollectedByAttributeRector/Source/`.
- [x] Add `tests/Rector/Eloquent/CollectedByAttributeRector/CollectedByAttributeRectorTest.php`.
- [x] Register rule in `config/sets/eloquent.php` — add `CollectedByAttributeRector::class` to the `$rectorConfig->rules([...])` array.
- [x] Run `vendor/bin/pest tests/Rector/Eloquent/CollectedByAttributeRector` — confirm green.

### Phase 2: Quality + docs (Priority: MEDIUM)

- [x] Run full `vendor/bin/pest` suite — no regressions.
- [x] Delegate to `backend-quality` skill for Pint + PHPStan.
- [x] Update `README.md` if it lists rules individually (verify first).

---

## Open Questions

None.

---

<!-- ## Resolved Questions
1. **Why visit `Class_` and not `ClassMethod`?** Same as ObservedByAttributeRector.
   Both attribute insertion and method removal require the parent Class_ node.

2. **Why trivial-body-only guard?** `newCollection()` sometimes holds custom
   merging or filtering logic beyond `return new X($models)`. Those cases need
   developer attention; we only automate the safe, canonical pattern.

3. **Why return type as the collection FQCN?** The return type is the authoritative
   declaration; the constructor call must match it. Using the return type avoids
   resolving the constructed class's parent hierarchy.
-->

## Findings

- Same `PHPStan\Node\AnonymousClassNode` discovery as `ObservedByAttributeRector`: use `$node->isAnonymous()` to gate anonymous classes, not `$node->name === null`.
- `$method->returnType` is `null` when the method has no declared return type; added an explicit null guard before calling `$this->getName()` to satisfy PHPStan and prevent a runtime crash.
- PHPStan cannot infer the correlation between `$newCollectionMethod !== null` and `$newCollectionKey !== null` — the null check was extended to `$newCollectionMethod === null || $newCollectionKey === null` to give PHPStan the information it needs.
