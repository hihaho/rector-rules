# Name Opaque Bool/Null Flag Arguments

## Overview

Two Rector rules that convert opaque positional `true` / `false` / `null`
arguments into named arguments, so a bare flag at a call site becomes
self-documenting (`in_array($needle, $haystack, true)` →
`in_array($needle, $haystack, strict: true)`). This formalizes a manual
code-style cleanup — naming opaque flag arguments where it adds value — into
an automated, repeatable transform. The rules split native-function flags
(param names frozen by PHP) from first-party method flags (param names you
own), because the two carry different risk and cost profiles.

## Assumptions

<!-- Audit ledger — one bullet per AI-introduced inference. Sign off by skimming this section. -->

- **Two rules sharing a `Concerns` trait, not one rule.** User asked me to
  research one-vs-two; decision + rationale in Resolved Questions #1. Both
  tiers are in scope.
- **Trigger = bare `true`/`false`/`null` literal only** (a `ConstFetch` whose
  lowercased name is `true`/`false`/`null`). Confirmed by user. The
  occasional "skip an optional parameter" case is **out of scope** — intent
  isn't mechanically detectable. (Resolved #2)
- **Native-function map ships a curated default and is configurable.**
  Confirmed by user. Default set: `in_array`, `array_search`, `json_decode`
  (the common native flag functions). Justification for this exact set in
  Resolved #3.
- **Both rules enabled by default** (no opt-in confirm flag). Confirmed by
  user. This is a safe style transform, unlike `FlagColumnToBooleanRector`.
- **Safety gate: only name the flag arg when it is the *last* argument of the
  call.** AI-chosen to avoid emitting a positional argument after a named one
  (a PHP fatal). Grilled — see Resolved #4.
- **Tier B defaults `first_party_namespaces` to `['App\\']`** and is
  configurable. AI-chosen so the rule works out-of-the-box for a conventional
  Laravel app while never naming args against vendor signatures. (Resolved #5)
- **Tier B skips silently when the callee can't be reflected** (dynamic calls,
  closures, `__call` magic, unresolved types). AI-chosen, consistent with the
  repo's "skip when uncertain" rules.
- **Category = `CodeQuality`.** AI-chosen; it's a readability transform, and
  the repo has no `NamedArguments` category. (Resolved #6)

---

## 1. Architecture

Two rules under `src/Rector/CodeQuality/`, plus one shared trait under
`src/Rector/CodeQuality/Concerns/`:

| Component | Node types | Resolution | Cost |
|---|---|---|---|
| `NativeFunctionFlagArgumentToNamedRector` | `FuncCall` | static name→param map | cheap |
| `FirstPartyFlagArgumentToNamedRector` | `MethodCall`, `StaticCall` | `ReflectionResolver` → param name | heavier |
| `NamesFlagArguments` (trait) | — | shared literal-detection + arg-naming mechanics | — |

Splitting on node type is natural: native flags are `FuncCall`s; first-party
flags are all method/static calls. The shared trait means no
logic duplication despite two classes — the repo already uses this pattern
(`AbstractAddSuffixRector`, `ChecksMigrationContext`).

### Shared trait `NamesFlagArguments`

```php
// True when $arg is a positional, non-unpacked bare true/false/null literal.
protected function isBareBoolOrNullFlag(Arg $arg): bool;

// Names the arg at $index iff it is the LAST arg of the call and is a bare
// flag literal; mutates the Arg in place and returns true. No-op + false
// otherwise (already named, not last, not a literal, missing).
protected function nameTrailingFlagArgument(array $args, int $index, string $paramName): bool;
```

`isBareBoolOrNullFlag` checks: `$arg->name === null`, `$arg->unpack === false`,
and `$arg->value` is a `ConstFetch` whose `name->toLowerString()` is one of
`true` / `false` / `null`.

## 2. Tier A — `NativeFunctionFlagArgumentToNamedRector`

Config constant `FUNCTION_FLAG_ARGUMENTS` — a map of lowercased function name
→ `[positional index => parameter name]`. Default:

```php
'in_array'     => [2 => 'strict'],
'array_search' => [2 => 'strict'],
'json_decode'  => [1 => 'associative'],
```

`refactor(FuncCall $node)`:

1. `$node->name instanceof Name` — else skip. (Direct instance check, not
   `isName()`; per the rule-perf memory, name-resolver machinery is the
   per-node bottleneck.)
2. `$map = $this->functionMap[strtolower($node->name->toString())] ?? null` —
   null → skip.
3. For the configured `[index => param]`, call
   `nameTrailingFlagArgument($node->getArgs(), $index, $param)`.
4. Return `$node` if any arg was named, else `null`.

The **last-arg** guard inside the trait is what makes the index-based map safe:
`json_decode($j, true, 512)` is left untouched (the flag isn't last), while
`json_decode($j, true)` converts.

`configure()`: validate the array shape (`Assert::isArray`, string keys,
int→string-non-empty inner pairs), merge over the default.

## 3. Tier B — `FirstPartyFlagArgumentToNamedRector`

Config constant `FIRST_PARTY_NAMESPACES` — list of namespace prefixes,
default `['App\\']`.

`refactor(MethodCall|StaticCall $node)` — cheap gates first, reflection last:

1. Find the **last** arg; if it isn't a bare bool/null flag → skip. (No
   reflection yet — this bails on the overwhelming majority of calls before
   paying for reflection.)
2. Resolve the callee via `ReflectionResolver`
   (`resolveMethodReflectionFromMethodCall` / `...FromStaticCall`). Unresolved
   → skip.
3. Declaring class namespace must start with one of `FIRST_PARTY_NAMESPACES`
   → else skip (never touch vendor signatures).
4. From the `ParametersAcceptor` (`ParametersAcceptorSelector::selectSingle`),
   read the parameter at the last position. If that parameter is variadic →
   skip. Take its `getName()`.
5. `nameTrailingFlagArgument(...)` with the resolved name; return `$node` or
   `null`.

Only the **last** argument is ever considered, for the same fatal-avoidance
reason as Tier A, and because it keeps reflection to a single param lookup.

## 4. Registration & docs

- Register both rules in the package's exposed rule set (verify the
  registration mechanism — `config/` set file vs per-rule).
- Both implement `getRuleDefinition()` with `ConfiguredCodeSample`s using
  framework-generic placeholders per `CLAUDE.md` (e.g.
  `App\Services\TokenStore::resolve($platform, inherit: false)`), never real
  domain method or class names.

## Edge Cases

| Scenario | Handling |
|----------|----------|
| `in_array($x, $list, true)` | Named → `strict: true`. Tier A. Phase 1 Tests. |
| `in_array($x, $list, $flag)` (variable, not literal) | Skip — `isBareBoolOrNullFlag` fails. Phase 1 Tests. |
| `in_array($x, $list)` (no flag arg) | Skip — no arg at index 2. Phase 1 Tests. |
| `in_array($x, $list, strict: true)` (already named) | Skip — `$arg->name !== null`. Idempotent. Phase 1 Tests. |
| `json_decode($j, true, 512)` (flag not last) | Skip — avoids positional-after-named fatal. Phase 1 Tests. |
| `json_decode($j, true)` | Named → `associative: true`. Phase 1 Tests. |
| Unknown native function (`strpos(...)`) | Skip — not in map. Phase 1 Tests. |
| `$firstPartyObj->doThing($x, false)` | Named with resolved param name. Tier B. Phase 2 Tests. |
| `$vendorObj->doThing($x, false)` (non-first-party) | Skip — namespace gate. Phase 2 Tests. |
| Dynamic/closure/`__call` callee (unresolved reflection) | Skip silently. Phase 2 Tests. |
| Variadic param at flag position (`->log(true, ...$rest)`) | Skip — variadic check. Phase 2 Tests. |
| `...$args` unpacked flag arg | Skip — `$arg->unpack === true`. Phase 1 + 2 Tests. |
| Single-arg call `renderAsAnchor(false)` (flag is first AND last) | Named → `mobile: false`. Last-arg guard is satisfied; naming the first/only arg is valid and desired. Phase 2 Tests. |

## Implementation

### Phase 1: Shared trait + native-function rule (Priority: HIGH)

- [x] Add `src/Rector/CodeQuality/Concerns/NamesFlagArguments.php` — `isBareBoolOrNullFlag()` and `nameTrailingFlagArgument()` (last-arg guard lives here).
- [x] Add `NativeFunctionFlagArgumentToNamedRector` — `FuncCall` node type, default function map, `ConfigurableRectorInterface` with `FUNCTION_FLAG_ARGUMENTS`, `getRuleDefinition()` with anonymized samples.
- [x] Direct `instanceof Name` + map lookup gate (no `isName()`) per the rule-perf memory.
- [x] Tests — fixtures for: convert `in_array`/`array_search`/`json_decode`; skip non-literal, skip absent arg, skip already-named (idempotency), skip flag-not-last (`json_decode` 3-arg), skip unknown function, skip unpacked. Mirror `FlagColumnToBooleanRector` test layout (`Fixture/`, `config/configured_rule.php`).

### Phase 2: First-party method rule (Priority: HIGH)

- [x] Add `FirstPartyFlagArgumentToNamedRector` — `MethodCall` + `StaticCall`, inject `ReflectionResolver`, `FIRST_PARTY_NAMESPACES` config (default `['App\\']`), reuse the trait.
- [x] Cheap literal pre-gate before reflection; namespace gate; variadic-param skip; unresolved-reflection skip.
- [x] Tests — `Source/` fixture classes (first-party + a fake vendor namespace) like `FlagColumnToBooleanRector/Source`. Cover: convert first-party method + static call; skip vendor namespace; skip unresolved callee; skip variadic; first/only-arg conversion.

### Phase 3: Registration & documentation (Priority: MEDIUM)

- [x] Register both rules in the package's rule set (verify mechanism first). — added to `config/sets/code-quality.php` (`HihahoSetList::CODE_QUALITY`), enabled by default.
- [x] Add README/docs entries consistent with existing rules; regenerate rule docs if the repo generates them from `getRuleDefinition()`. — README Code Quality section updated; `docs/` is empty and there is no doc-generation step, so nothing to regenerate.
- [x] Run `vendor/bin/pest`, Pint, PHPStan (delegate to `backend-quality`). — Pint passed, PHPStan 0 errors, full suite 191 passed.

---

## Open Questions

None.

---

## Resolved Questions

1. **One rule or two for both tiers?** **Decision:** Two rules
   (`NativeFunctionFlagArgumentToNamedRector` + `FirstPartyFlagArgumentToNamedRector`)
   sharing a `NamesFlagArguments` trait. **Rationale:** (a) **Different risk** —
   naming a native-function arg couples to a PHP-frozen name; naming a
   first-party method arg couples a call site to a parameter name you can
   rename, turning a local rename into a call-site change. A consumer may want
   the safe native transform without the reflection-based one; two rules give
   that granularity, one rule can't. (b) **Different cost** — Tier A is a string
   map lookup; Tier B does per-node reflection (the documented bottleneck).
   Separation lets the cheap rule run without dragging reflection into every
   `FuncCall`. (c) **Different node types** — `FuncCall` vs
   `MethodCall`/`StaticCall`, so the split is natural, not forced. The shared
   trait removes the only downside (duplicated literal/arg-naming logic).
2. **What triggers the rename?** **Decision:** Bare `true`/`false`/`null`
   literal only. **Rationale:** Matches the bulk of real-world cases and is
   mechanically unambiguous; the "skip optional parameter" case needs developer
   intent that
   can't be inferred from the AST.
3. **Native function default set.** **Decision:** `in_array`, `array_search`,
   `json_decode`, configurable. **Rationale:** Exactly the native functions the
   PR touched; each has a single, well-known trailing flag param. Kept tight
   rather than guessing at a broader list — consumers extend via config.
4. **Why the last-arg-only guard?** **Decision:** Only name the flag when it is
   the final argument. **Rationale:** PHP forbids a positional argument after a
   named one; naming a middle arg (`json_decode($j, associative: true, 512)`)
   would be a fatal. Last-arg-only is the simplest provably-safe boundary and
   covers every PR example.
5. **Tier B default namespace.** **Decision:** `['App\\']`, configurable.
   **Rationale:** Works out-of-the-box for a conventional Laravel app while
   guaranteeing vendor signatures are never named (you don't own their param
   names).
6. **Category.** **Decision:** `CodeQuality`. **Rationale:** Readability
   transform; no `NamedArguments` category exists and one isn't warranted for
   two rules.

---

## Findings

- **Phase 1.** Used `$this->getName($node)` (not a raw `$node->name->toString()`)
  to resolve the function name, matching core's `NullToStrictStringFuncCallArgRector`.
  This handles the global-function fallback in namespaced files correctly — a
  bare `in_array()` in `namespace App` still resolves to the global name. The
  cheap `instanceof Name` pre-gate still bails dynamic calls before the single
  name resolution; no per-spelling `isName()` loop. 10 fixtures, all green.
- **Phase 2.** Source fixture classes live under the `Tests\` PSR-4 root, so
  the namespace-skip path is exercised by gating first-party to a
  `…\Source\FirstParty\` prefix and placing the "vendor" double under
  `…\Source\Vendor\` (which does not match the prefix). Variadic skip is reached
  via `parameters[$lastIndex]->isVariadic()`; the `?? null` also covers a call
  whose last positional arg lands past the declared params. 8 fixtures, all
  green. The reflection pre-gate (last arg must be a bare bool/null literal)
  bails before any reflection on the common case.
- **Phase 3 / verification.** Registered both rules in
  `config/sets/code-quality.php` (default-on). PHPStan surfaced three
  static-only annotation issues (no runtime impact, no test warranted per the
  PHPStan guideline): `getArgs()` returns `array<Arg>` (key type `array-key`),
  not `array<int, Arg>`, so the trait param was loosened to `array<Arg>`; and a
  variadic `bool ...$flags` is `array<int|string, bool>` (named args can key it),
  so the test helper's `@return` is `array<bool>`, not `list<bool>`. Final:
  Pint clean, PHPStan 0 errors, 191 tests pass.
