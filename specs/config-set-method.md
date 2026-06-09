# ConfigSetMethodRector

## Overview

Converts the array-setter form of Laravel's `config()` helper —
`config(['key' => $value])` — to the explicit method-call form
`config()->set('key', $value)`. Multi-key arrays are expanded into one
`config()->set()` call per pair.

## Assumptions

<!-- Audit ledger — one bullet per AI-introduced inference. Sign off by skimming this section. -->

- **Node type = `Expression`.** The rule visits `Expression` statements rather
  than the inner `FuncCall`. Multi-key arrays must expand one statement into
  several, which requires the enclosing statement node. AI-chosen; see
  Resolved #1.
- **Standalone-statement scope only.** The rule fires only when the `config([])`
  call is the direct child of an `Expression` statement (not inside an
  assignment, condition, or other expression). AI-chosen; see Resolved #2.
- **Multi-key arrays expand to multiple statements.** Each key-value pair in the
  array becomes a separate `config()->set(...)` call, preserving source order.
  See Resolved #3.
- **Keys must be `String_` literals only.** Dynamic keys and class-constant
  keys (`config([$variable => $value])`, `config([Config::KEY => $value])`)
  are not converted. AI-chosen safety gate; constant-key resolution would
  require value-resolver infrastructure and is out of scope.
- **Category = `CodeQuality`.** AI-chosen; this is a call-site readability
  improvement with no semantic change. Consistent with existing `CodeQuality`
  rules.

---

## 1. Architecture

Single rule `src/Rector/CodeQuality/ConfigSetMethodRector.php`.
No constructor injection required (no external services needed — just AST
manipulation).

### Node path

```
Expression
  FuncCall(name="config")
    args[0]: Array_
      items[]:
        ArrayItem(key=String_("some.key"), value=Expr)
        ...
```

### refactor() flow

```php
public function getNodeTypes(): array
{
    return [Expression::class];
}

public function refactor(Node $node): null|Node|array
{
    if (!$node->expr instanceof FuncCall) {
        return null;
    }

    $funcCall = $node->expr;
    if (!$this->isName($funcCall->name, 'config')) {
        return null;
    }

    $args = $funcCall->getArgs();
    if (count($args) !== 1 || !$args[0]->value instanceof Array_) {
        return null;
    }

    $array = $args[0]->value;
    $setterCalls = $this->buildSetterCalls($array);
    if ($setterCalls === null) {
        return null; // array had non-string-literal key(s) or was empty
    }

    if (count($setterCalls) === 1) {
        return $setterCalls[0]; // single Expression — return directly
    }

    return $setterCalls; // multiple Expressions — Rector expands them
}
```

### Building setter calls

```php
/**
 * @return Expression[]|null  null when any item has a non-string key
 */
private function buildSetterCalls(Array_ $array): ?array
{
    if ($array->items === []) {
        return null;
    }

    $calls = [];
    foreach ($array->items as $item) {
        if (!$item instanceof ArrayItem || !$item->key instanceof String_) {
            return null;
        }

        // config()->set('key', $value)
        $repoCall = new MethodCall(
            new FuncCall(new Name('config')),
            new Identifier('set'),
            [new Arg($item->key), new Arg($item->value)],
        );
        $calls[] = new Expression($repoCall);
    }

    return $calls;
}
```

`config()` with no arguments returns the `Illuminate\Config\Repository`
instance; `->set('key', $value)` is its setter method. The generated call is
identical to the standard setter call form.

## 2. Rule definition

```php
public function getRuleDefinition(): RuleDefinition
{
    return new RuleDefinition(
        'Replace config([\'key\' => $value]) setter form with config()->set(\'key\', $value)',
        [
            new CodeSample(
                <<<'CODE_SAMPLE'
config(['queue.default' => 'sync']);
CODE_SAMPLE,
                <<<'CODE_SAMPLE'
config()->set('queue.default', 'sync');
CODE_SAMPLE,
            ),
        ],
    );
}
```

## Edge Cases

| Scenario | Handling |
|----------|----------|
| `config(['key' => $val])` — single pair | Convert to `config()->set('key', $val)`. Tests Phase 1. |
| `config(['k1' => $v1, 'k2' => $v2])` — multi-pair | Expand to two sequential `config()->set()` calls. Tests Phase 1. |
| `config(['key' => $val1, 'key2' => $val2])` — three+ pairs | Expand one statement per pair. Tests Phase 1. |
| `config([$variable => $value])` — dynamic key | Skip — key is not a `String_`. Tests Phase 1. |
| `config([Config::KEY => $value])` — class-constant key | Skip — key is not a `String_`. Tests Phase 1. |
| `config([])` — empty array | Skip — no items to convert. Tests Phase 1. |
| `$x = config(['key' => $val])` — in an assignment | Skip — enclosing node is `Assign`, not a bare `Expression`. Tests Phase 1. |
| `config()` with no args (getter form) | Skip — single arg must be `Array_`. Tests Phase 1. |
| `config('key')` — string getter form | Skip — arg is `String_`, not `Array_`. Tests Phase 1. |
| `config(['key' => $val])` already converted | Idempotent — call site is `MethodCall`, not `FuncCall`. Tests Phase 1. |

## Implementation

### Phase 1: Rule + tests (Priority: HIGH)

- [ ] Add `src/Rector/CodeQuality/ConfigSetMethodRector.php` — visit `Expression`, implement `refactor()` and `buildSetterCalls()` as described. No constructor dependencies.
- [ ] Add fixtures under `tests/Rector/CodeQuality/ConfigSetMethodRector/Fixture/`:
  - `converts_single_pair.php.inc` — single key-value pair → one setter call.
  - `converts_multi_pair.php.inc` — two pairs → two setter calls.
  - `converts_three_pairs.php.inc` — three pairs → three setter calls.
  - `skip_dynamic_key.php.inc` — variable key; no change.
  - `skip_class_constant_key.php.inc` — `Config::KEY` constant key; no change.
  - `skip_already_converted.php.inc` — `config()->set(...)` method-call form; no change (idempotent).
  - `skip_empty_array.php.inc` — empty array; no change.
  - `skip_in_assignment.php.inc` — `$x = config([...])` form; no change.
  - `skip_getter_form.php.inc` — `config('key')` getter; no change.
  - `skip_no_args.php.inc` — `config()` with no args; no change.
- [ ] Add `tests/Rector/CodeQuality/ConfigSetMethodRector/config/configured_rule.php`.
- [ ] Add `tests/Rector/CodeQuality/ConfigSetMethodRector/ConfigSetMethodRectorTest.php`.
- [ ] Register rule in `config/sets/code-quality.php` — add `ConfigSetMethodRector::class` to the `$rectorConfig->rules([...])` array.
- [ ] Run `vendor/bin/pest tests/Rector/CodeQuality/ConfigSetMethodRector` — confirm green.

### Phase 2: Quality + docs (Priority: MEDIUM)

- [ ] Run full `vendor/bin/pest` suite — no regressions.
- [ ] Delegate to `backend-quality` for Pint + PHPStan.
- [ ] Update `README.md` if it lists rules individually (verify first).

---

## Open Questions

None.

---

<!-- ## Resolved Questions
1. **Why visit `Expression` and not `FuncCall`?** Multi-key arrays must expand
   one statement into multiple `config()->set()` calls. Returning `Stmt[]` is
   only possible when visiting a statement node; `FuncCall` is an expression and
   can only be replaced with another expression. Visiting `Expression` lets the
   rule return `Stmt[]` for multi-key cases while also handling single-key cases.

2. **Why standalone-statement scope only?** `config(['k' => $v])` returns null
   (it is used purely for its side effect). Using it inside an assignment or
   condition is unusual; multi-pair expansion inside an expression context would
   be syntactically invalid. Scoping to bare `Expression` statements avoids
   generating broken code in edge cases.

3. **Multi-key expansion — one-to-many expansion.** When the array has more
   than one pair, each pair becomes a separate `config()->set()` call, matching
   the intent of the setter form. Single-pair case is a 1:1 replacement.
-->

## Findings

<!-- Notes added during implementation. Do not remove this section. -->
