# Code quality

`HihahoSetList::CODE_QUALITY`

| Rule | Effect |
|---|---|
| `RemoveUnnecessaryNullsafeOperatorRector` | Removes `?->` when the receiver can never be null |
| `NativeFunctionFlagArgumentToNamedRector` | Names the opaque trailing flag of well-known native functions |
| `FirstPartyFlagArgumentToNamedRector` | Names opaque bool/null flags on first-party method, static and constructor calls |
| `ConfigSetMethodRector` | Converts the `config([...])` array-setter form to `config()->set(...)` |
| `RemoveDefaultValuedArgumentRector` | Drops an argument whose value equals the parameter's default |

## `RemoveUnnecessaryNullsafeOperatorRector`

```diff
-return $this->resource->author?->name;
+return $this->resource->author->name;
```

PHPStan reports this at `level: max` under bleeding-edge (`nullsafe.neverNull`) but
does not fix it; this rule does.

- Handles `?->property` and `?->method()`, converting only the segment whose immediate
  receiver is provably non-null. In `$resource?->maybeAuthor?->name` the load-bearing
  nullsafe survives.
- Nullability comes from the PHPStan `Scope` (`getNativeType`), which resolves a `?Foo`
  receiver to `Foo|null` and leaves it alone. A method-call or static-call receiver is
  read from the called method's declared return type instead.
- A receiver that is `mixed`, unknown, a union with a scalar, possibly-null, or a
  function call or `new` expression is always left alone. The rule only removes a `?->`
  it can prove is redundant.
- Phpdoc-only non-nullability (an Eloquent `@property`, say) is ignored by default, so a
  stale annotation cannot cause a wrong removal. Set `trust_phpdoc_types` to `true` to
  trust phpdoc too.

## `NativeFunctionFlagArgumentToNamedRector` and `FirstPartyFlagArgumentToNamedRector`

```diff
-$found = in_array($needle, $haystack, true);
+$found = in_array($needle, $haystack, strict: true);
```

```diff
-$token = $store->resolve($platform, false);
+$token = $store->resolve($platform, inherit: false);
```

The two rules split by what owns the parameter name:

- `NativeFunctionFlagArgumentToNamedRector` works off a curated map of native functions
  (`in_array`/`array_search` → `strict`, `json_decode` → `associative`) whose flag names
  are frozen by PHP. Extend it via
  `['function_flag_arguments' => ['in_array' => [2 => 'strict']]]`.
- `FirstPartyFlagArgumentToNamedRector` resolves the parameter name by reflection across
  method, static and `new` calls, including through a nullable receiver. It fires only
  for callees in your own namespaces, never vendor signatures, whose parameter names can
  change under semver. Defaults to `['App\\']`; configure with `first_party_namespaces`.

### Scope

- Only a bare `true`, `false` or `null` literal is named. A variable, constant or enum
  case is already self-documenting.
- A flag is named only when every argument to its right is already named or is itself a
  flag being named: the call's trailing namable run. A positional argument after a
  named one is a PHP fatal, so `$store->configure($key, false, isBoolean: true)` names
  the `false`, while `json_decode($j, true, 512)` is left alone.
- Already-named arguments, unpacked arguments (`...$args`), variadic target parameters,
  first-class callables and unresolvable callees are skipped.

### Opt-in flags on `FirstPartyFlagArgumentToNamedRector`

| Key | Effect |
|---|---|
| `cascade_trailing_args` | Names a non-last flag by also naming the positionals after it: `loadCount(true, $start, $end)` → `loadCount(hasStarted: true, start: $start, end: $end)`. Broader diffs, so off by default. |
| `name_preceding_positionals` | Names positionals *before* an already-named one: `paginate(1, perPage: 50)` → `paginate(page: 1, perPage: 50)`. First-party only. |

For receivers Rector's type resolution cannot see at all, see
[named arguments from a manifest](11-named-argument-manifest.md).

## `ConfigSetMethodRector`

```diff
-config(['queue.default' => 'sync']);
+config()->set('queue.default', 'sync');
```

The array form of `config()` is a setter dressed as a getter. A multi-key array expands
into one `set()` call per pair, in source order.

- Fires only when the `config([...])` call is the whole statement. Inside an assignment
  or condition it is left alone, since multi-key expansion is only valid as standalone
  statements.
- Only string-literal keys are converted. A dynamic or class-constant key is untouched;
  an empty array is a no-op.
- Idempotent: the converted form is a method call, not the function call the rule matches.

## `RemoveDefaultValuedArgumentRector`

```diff
-$user->withPosts(callback: null, times: 2);
+$user->withPosts(times: 2);
```

### Scope

- An argument is dropped only when the parameter's default is a single statically known
  constant (`null`, a bool/int/float/string literal, `[]`, or a class constant resolving
  to one of those) and the argument is that exact type and value. The match is
  strict: `0` is not dropped against a `false` default. A computed default or an
  enum-case default (`= Status::Active`) is never droppable.
- By default it drops only an already-named default argument (order-independent) or a
  trailing positional default (iteratively). Both are safe on any callee, vendor
  included, since they couple to the default *value* only.
- A positional default is kept once an earlier optional positional was overridden, since
  that default is often the overridden argument's operand. So `->has($relation, '=', 1)` keeps
  the `1`, while `->has($relation, '>=', 1)` collapses to `->has($relation)`.
- Unpacked arguments, variadic target parameters, first-class callables and unresolved
  callees are skipped.

### Configuration

| Key | Effect |
|---|---|
| `cascade_drop` | Also drops a *mid*-positional default by naming the arguments after it: `attach($user, [], $relationship)` → `attach($user, relationship: $relationship)`. First-party only, gated on `first_party_namespaces` (default `App\`). |
| `exclude_calls` | Methods the rule must never touch, keyed by class FQN → method names. |

`exclude_calls` exists for methods whose return value is serialized in an
argument-count-sensitive way. A middleware factory stringified into a route signature
(`ThrottleRequests::with(60, 1)` → `throttle:60,1`) changes meaning when a
default-valued argument is dropped, and the parser cannot detect that coupling:

```php
->withConfiguredRule(RemoveDefaultValuedArgumentRector::class, [
    RemoveDefaultValuedArgumentRector::EXCLUDE_CALLS => [
        ThrottleRequests::class => ['with'],
    ],
])
```

A call matches when the configured class is-a its *declaring* class or its *called*
class, so configuring either the base or a subclass works.
