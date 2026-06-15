# In-engine `@property` receiver resolution for `FirstPartyFlagArgumentToNamedRector`

## Overview

`FirstPartyFlagArgumentToNamedRector` names a bare bool/null flag argument only
when Rector's PHPStan can resolve the call's receiver to a single first-party
class.

**Scope precision — two distinct receiver kinds, only one is the gap:**

- A **native docblock `@property`** (`@property TokenStore $tokens` on the class)
  is resolved by PHPStan's built-in `AnnotationsPropertiesClassReflectionExtension`
  with **no extra wiring** — so the rule **already** fires on these today. Not a gap.
- An **extension-only dynamic property** — one with no declared property and no
  typed docblock, whose type exists solely because a `PropertiesClassReflectionExtension`
  synthesizes it (larastan's Eloquent attribute synthesis, a container/service
  accessor, a generic-inherited property) — does **not** resolve under Rector's
  default container, so the flag stays positional and the rule silently skips.
  **This** is the gap.

Research established Rector **can** load such an extension into the same PHPStan
container that powers `$this->getType()` / `ClassReflection::hasMethod()`, via
`RectorConfig::phpstanConfig()` (fluent: `->withPHPStanConfigs([...])`). The rule
itself needs no behavioural change — once the receiver resolves to a single
first-party class, the existing logic fires. This spec **proves that end-to-end**
with a committed (process-isolated) test that loads a synthetic
`PropertiesClassReflectionExtension` into Rector, corrects the README claim that
says this is impossible (while keeping the native-docblock case distinct), adds a
consumer decision recipe, and separately closes the runtime-macro shape's
coverage with a single-arg manifest fixture.

> **Test-harness constraint (from review).** Rector's test base
> (`AbstractLazyTestCase`) holds a **single static `RectorConfig` per process**;
> `PHPStanServicesFactory` reads `PHPSTAN_FOR_RECTOR_PATHS` **only in its
> constructor** and the PHPStan-backed services (`ReflectionProvider`,
> `NodeScopeResolver`, …) are process singletons; `SimpleParameterProvider::addParameter`
> **accumulates and never clears**; `AbstractRectorTestCase::setUp` resets only
> tagged resettables + rule configs, not the PHPStan container. Therefore a
> with-extension and a without-extension config in the **same process are
> order-dependent and leak** — a green full-suite run is *not* evidence of
> isolation. The in-engine proof **must run in its own PHP process** (see §3/Phase 1).

## Assumptions

<!-- Sign-off ledger. Forks 1-2 were confirmed with the user; the rest are AI choices recorded for skim-review. -->

- **Docs deliverable = README correction + recipe** (confirmed). Fix the
  overstated "which Rector cannot load into its own engine" sentence and add a
  short manifest-vs-in-engine decision table. No new synced `.ai/` guideline.
- **Add the single-arg manifest fixture** (confirmed). `m(false)` → `m(named: false)`
  is currently unproven by a dedicated fixture; add it so the runtime-macro shape
  (which stays manifest-only) is demonstrably covered.
- **No production change to the rule is expected** (AI inference, gated by the
  Phase 1 spike). The fix is consumer-side wiring + a proof test + docs. If the
  spike shows a guard in the rule blocks an extension-supplied class reflection,
  that becomes a real code task and is surfaced before proceeding — see Open
  Questions Q3.
- **Proof-by-contrast** (AI choice). The same magic-`@property` fixture shape is
  run under two configs — one that loads the extension neon, one that does not —
  so the test demonstrates the extension is the load-bearing element, not an
  incidental pass.
- **Placeholders** (AI choice, anonymization). Host class `Registry` whose magic
  `tokens` property is supplied **only by the synthetic extension** (no typed
  `@property` docblock — see §2); first-party `TokenStore` with a flag method
  `fetch(string $key, bool $inherit = true)`. Generic, framework-neutral, no
  product domain.
- **Test placement** (AI choice). New configs + fixture subdirs + `Source/`
  doubles live under the existing
  `tests/Rector/CodeQuality/FirstPartyFlagArgumentToNamedRector/` tree rather
  than a new top-level test dir.
- **Macro/runtime shape stays out of in-engine scope** (confirmed by research).
  A method registered at runtime (`::macro()`) is invisible to static analysis
  even with larastan loaded; it remains a manifest-bridge case and is documented
  as such, not chased in-engine.

---

## 1. Current State

`src/Rector/CodeQuality/FirstPartyFlagArgumentToNamedRector.php`:

- **First-party gate** keys on the **method's declaring class**, not the receiver
  holder:

  ```php
  private function isFirstParty(MethodReflection $methodReflection): bool
  {
      $declaringClass = $methodReflection->getDeclaringClass()->getName();
      foreach ($this->firstPartyNamespaces as $namespace) {
          if (str_starts_with($declaringClass, $namespace)) {
              return true;
          }
      }
      return false;
  }
  ```

  So the flag method (`fetch`) must be declared on a first-party class
  (`TokenStore`); the `@property` holder (`Registry`) namespace is irrelevant to
  the gate.

- **Receiver resolution** for a `MethodCall` strips a nullable, then requires
  **exactly one** concrete class:

  ```php
  $callerType = TypeCombinator::removeNull($this->getType($node->var));
  $classReflections = $callerType->getObjectClassReflections();
  if (count($classReflections) !== 1) {
      return null; // union / unknown receiver → skip
  }
  ```

  For `$registry->tokens->fetch('key', false)` where `tokens` is an
  **extension-only dynamic property** — no declared property, no typed
  `@property` docblock, type synthesized solely by a
  `PropertiesClassReflectionExtension` — bare PHPStan (without that extension
  loaded) resolves `$registry->tokens` to **no concrete class**, so
  `getObjectClassReflections()` is empty → skip. (A native docblock `@property`
  would instead resolve via PHPStan's built-in annotation extension and the rule
  would already fire — see the Overview distinction; that case is not the gap.)

`config/sets/code-quality.php` registers `FirstPartyFlagArgumentToNamedRector`
(ships on). No test in the repo loads a PHPStan config into Rector
(`phpstanConfig` is currently unexercised here).

### Why the in-engine path is viable

`RectorConfig::phpstanConfig(string)` / `->withPHPStanConfigs([...])` writes
`Option::PHPSTAN_FOR_RECTOR_PATHS`. `PHPStanServicesFactory` builds a real PHPStan
`ContainerFactory`; `resolveAdditionalConfigFiles()` **prepends** the consumer's
neon to Rector's internal neons, and `LazyContainerFactory` resolves
`ReflectionProvider` / `NodeScopeResolver` / `ScopeFactory` / `TypeNodeResolver`
from that merged container — the exact services behind a rule's type queries. A
`PropertiesClassReflectionExtension` registered in the loaded neon therefore
participates in `$this->getType($node->var)` resolution. (Runtime macros remain
unresolvable — they are never statically registered anywhere the extension can
see.)

---

## 2. Proposed Approach

1. Author a synthetic `PropertiesClassReflectionExtension` (a test double) that
   resolves the magic property `tokens` on `Registry` to an `ObjectType` of the
   first-party `TokenStore`. This is the minimal stand-in for what larastan does
   for an Eloquent `@property` chain. **Critical:** the host class must NOT carry
   a typed `@property TokenStore $tokens` docblock — PHPStan resolves docblock
   `@property` natively (`AnnotationsPropertiesClassReflectionExtension`), so a
   docblock would let *bare* PHPStan resolve the receiver and collapse the
   proof-by-contrast (the without-extension fixture would convert too). The
   concrete type must come **only** from the registered extension, mirroring the
   real larastan case (a service/container property, not a docblock).
2. Register it in a `phpstan-extension.neon` under the test config dir
   (`services:` + tag `phpstan.broker.propertiesClassReflectionExtension`). The
   class is autoloadable via `autoload-dev` PSR-4 (`Hihaho\RectorRules\Tests\`).
3. A new rector test config calls
   `$rectorConfig->phpstanConfig(__DIR__ . '/phpstan-extension.neon')` and
   configures `FirstPartyFlagArgumentToNamedRector` with `FIRST_PARTY_NAMESPACES`
   covering the `Source` namespace of `TokenStore`.
4. Fixtures prove the conversion fires **with** the extension, plus the vendor /
   union / nullable edges. The without-extension contrast must run in a
   **separate PHP process** from the with-extension test (the static, accumulate-only
   container makes a same-process contrast order-dependent — see the Overview
   constraint), so the two live in distinct process-isolated test classes.
5. Independently, add the single-arg manifest fixture to
   `NamedArgumentFromManifestRector`.
6. Correct the README and add the decision recipe — keeping the **native-docblock
   `@property`** case (already handled, no wiring) distinct from the
   **extension-only dynamic property** case (needs `withPHPStanConfigs`).

No edit to `FirstPartyFlagArgumentToNamedRector` is anticipated (gated by Q3).

---

## 3. Test Design

Under `tests/Rector/CodeQuality/FirstPartyFlagArgumentToNamedRector/`:

- `Source/Magic/Registry.php` — host that declares **no** `tokens` property and
  **no** typed `@property` for it; a `__get(string $name): mixed` body (using
  `$name`) makes the access well-formed and mirrors the real larastan shape. Bare
  PHPStan must type `$registry->tokens` as `mixed` (→ skip); the extension is the
  sole source of the concrete `TokenStore` type. Rector-clean, non-empty body.
- `Source/Magic/TokenStore.php` — first-party; `fetch(string $key, bool $inherit = true): string`
  with a body that uses both params. The trailing bare flag `false` is what the
  rule names; the preceding `$key` positional stays positional (valid PHP), so
  **no** `cascade_trailing_args` / `name_preceding_positionals` knob is involved.
- `Source/Magic/VendorReceiver.php` + `Source/Magic/VendorFlag.php` — a host whose
  extension-supplied property resolves to a class **outside** the first-party
  namespace (`VendorFlag`), to prove the gate still rejects a vendor declaring
  class. Same no-docblock rule applies — resolution comes only from the extension.
- `Source/Magic/MagicPropertyExtension.php` — the synthetic
  `PropertiesClassReflectionExtension`, mapping per host: `Registry::$tokens` →
  `TokenStore`, `VendorReceiver::$flag` → `VendorFlag`, and a union host →
  two classes (for the union-skip edge). `hasProperty()`/`getProperty()` match on
  `$classReflection->getName()` + property name; `getProperty()` returns a
  `PropertyReflection` whose readable type is the mapped `ObjectType`.
- `config/phpstan-extension.neon` — registers the extension.
- `config/property_receiver_rule.php` — imports `config/config.php`, loads the
  neon via `phpstanConfig()`, configures the rule.
- A no-extension config (reuse/extend `configured_rule.php`) for the contrast
  fixture.

**Process isolation (mandatory).** Because the PHPStan container is a per-process
singleton built from the first config that triggers it, and
`PHPSTAN_FOR_RECTOR_PATHS` accumulates without clearing, the with-extension test
**must execute in its own PHP process** — otherwise whichever config builds the
container first decides the outcome for the whole run, and the result proves
nothing. Concretely:

- **Both** the with-extension and without-extension proofs must each run in their
  **own fresh PHP process** — not merely "different classes". A non-isolated
  without-extension test can still execute in the main PHPUnit process *after*
  another Rector test has already populated `PHPSTAN_FOR_RECTOR_PATHS` / built the
  static container, which makes it order-dependent and stops it proving absence of
  wiring. Mark each with process isolation (PHPUnit `#[RunTestsInSeparateProcesses]`
  / `@runTestsInSeparateProcesses`) or run each as a dedicated standalone test
  command that cannot share Rector static state with any other test class.
- Do not assume the broader suite's green run demonstrates non-leakage for either
  side.
- The Phase 1 spike must **first confirm** that a process-isolated Rector test
  actually boots its static container fresh and honours `phpstanConfig()` (and
  that process isolation co-operates with Rector's static state and the
  `PAO_DISABLE=1` parallel-output note). If isolation can't be made reliable in
  this harness, the in-engine claim is **not committable as a test** and the
  spec falls back to docs-only for the in-engine path (Q1).

Each `Source` double must be Rector-clean (`vendor/bin/rector process --dry-run`
= 0 changes) and must not itself contain a droppable/nameable call, so the CI
auto-fix bot can't mangle the signatures the test depends on.

---

## 4. Manifest Single-Arg Fixture

Under `tests/Rector/CodeQuality/NamedArgumentFromManifestRector/`:

- `Fixture/convert_single_arg.php.inc` — `$store->toggle(false)` → `$store->toggle(active: false)`.
- Manifest record appended to `config/manifest.json`:
  `{ "file": "convert_single_arg.php", "line": <n>, "method": "toggle", "argIndex": 0, "paramName": "active", "value": "false" }`.

Proves the minimal `m(false)` → `m(named: false)` shape (argIndex 0, single arg) —
the coverage path for a runtime-macro receiver the in-engine route can't reach.

---

## Edge Cases

| Scenario | Handling |
|----------|----------|
| Extension-supplied property resolves to a single first-party class, flag method declared there | Convert — `fetch('key', false)` → `fetch('key', inherit: false)` (Phase 1 convert fixture + Tests) |
| Host carries a native typed `@property` docblock | Bare PHPStan resolves it without the extension — **forbidden in the double**, would void proof-by-contrast (design constraint, §2/§3) |
| Nullable extension type (`TokenStore\|null`) | Convert — `removeNull` strips it to one class (Phase 2 nullable fixture + Tests) |
| Extension type is a **vendor** class (declaring class not first-party) | Skip — `isFirstParty` rejects (Phase 2 vendor-skip fixture + Tests) |
| Extension type is a union of 2+ classes | Skip — `count(...) !== 1` (Phase 2 union-skip fixture + Tests) |
| Extension **not loaded** into Rector | Skip — receiver unresolved, proving the extension is load-bearing. Must run in a **separate process** from the with-extension test (Phase 2 contrast fixture, isolated class + Tests) |
| Runtime macro/mixin method on a receiver | Out of scope in-engine; manifest-bridge only — documented in README recipe; argIndex-0 manifest path covered by Phase 3 |
| Extension leaking across test configs (static per-process container) | Structurally prevented by running the with-extension test in its own process; spike confirms no leak into a sibling test ordered after it (Phase 1) |
| Single-arg manifest naming at argIndex 0 | Convert (Phase 3 fixture + Tests) |

---

## Implementation

### Phase 1: Harness spike (Priority: HIGH — gates everything else)

- [x] **Isolation spike first.** Result: `AbstractRectorTestCase` **cannot** honour
  `phpstanConfig()` — its PHPStan services are built once as a per-process
  singleton (`LazyContainerFactory`) before the config's `PHPSTAN_FOR_RECTOR_PATHS`
  is read, and `#[RunTestsInSeparateProcesses]` crashes under Pest
  (`PHPUnit\TextUI\Configuration\Registry not found`). The Rector **CLI** honours
  it correctly. → Pivoted to a **subprocess proof test** (drives `vendor/bin/rector`
  per case), which is the spec's sanctioned "dedicated standalone test command"
  isolation form. See Findings + Resolved Q1.
- [x] Add `Source/Magic/Registry.php` (extension-only dynamic property, no
  docblock), reuse `Source/FirstParty/TokenStore.php`, add
  `Source/Magic/MagicPropertyExtension.php` + `Source/Magic/MagicPropertyReflection.php`
  (synthetic `PropertiesClassReflectionExtension`). Rector-clean (0 dry-run changes).
- [x] Add `config/phpstan-extension.neon` registering the extension; add
  `config/property_receiver_rule.php` loading it via `phpstanConfig()`.
- [x] Add the convert case + the subprocess test class
  (`...PropertyReceiverTest`) driving the CLI with the new config.
- [x] Confirm `vendor/bin/rector process --dry-run` reports 0 changes on the new
  `Source` doubles.
- [x] Tests — convert case green; subprocess design spawns child processes only,
  so it cannot leak into / be affected by other tests (full-suite-safe by design).

### Phase 2: In-engine fixture set (Priority: HIGH)

- [x] Nullable extension-type convert case (`nullableTokens`).
- [x] Vendor-receiver skip case (extension maps `client` → vendor `ExternalClient`).
- [x] Union extension-type skip case (extension maps `ambiguous` → 2 classes).
- [x] Without-extension contrast skip case (runs the `configured_rule.php` config,
  which has no `phpstanConfig()`) — proves the extension is load-bearing. Inherent
  process isolation via the subprocess, no shared static state.
- [x] Tests — all five cases green (16 assertions), order-independent.

### Phase 3: Manifest single-arg fixture (Priority: HIGH)

- [x] `Fixture/convert_single_arg.php.inc` (`$store->activate(false)` →
  `activate(active: false)`) + manifest record (argIndex 0, value `false`).
- [x] Tests — `activate(false)` → `activate(active: false)` converts (manifest
  suite 22 passed).

### Phase 4: Docs (Priority: MEDIUM)

- [x] Corrected the README `NamedArgumentFromManifestRector` section: dropped the
  "which Rector cannot load into its own engine" claim; now states native docblock
  `@property` already resolves, and documents `->withPHPStanConfigs([...])` as the
  in-engine option for extension-only dynamic properties.
- [x] Added the three-row decision table (native docblock → nothing to do;
  extension-only dynamic property → `withPHPStanConfigs` + larastan; runtime macro
  → manifest bridge).
- [x] No new synced `.ai/` guideline (per the confirmed docs scope).

---

## Open Questions

None — all resolved during implementation (see Resolved Questions).

---

## Resolved Questions

1. **Can an `AbstractRectorTestCase` honour `phpstanConfig()` (process-isolated or
   otherwise)?** **Decision:** No — pivoted to a subprocess proof test.
   **Rationale:** the spike confirmed the PHPStan services are a per-process
   singleton built before the config parameter is read, and PHPUnit
   `#[RunTestsInSeparateProcesses]` crashes under Pest
   (`PHPUnit\TextUI\Configuration\Registry not found`). The Rector **CLI** honours
   `phpstanConfig()` correctly, so the committed proof drives `vendor/bin/rector`
   in a child process per case — the spec's sanctioned "dedicated standalone test
   command" isolation, which is also exactly how a consumer's `rector.php` runs.
2. **Will PHPStan autoload a test-namespace extension referenced in the neon?**
   **Decision:** Yes. **Rationale:** the CLI run resolved and instantiated
   `MagicPropertyExtension` from `autoload-dev` PSR-4 and the conversion fired.
3. **Does the rule need a production change?** **Decision:** No. **Rationale:**
   once the receiver resolves, the existing `FirstPartyFlagArgumentToNamedRector`
   logic fires unchanged; this work is test doubles + config + docs only.
4. **Is the `PropertyReflection` contract stable across the PHPStan range?**
   **Decision:** Implement the base `PropertyReflection` (not
   `ExtendedPropertyReflection`). **Rationale:** the interface's own doc says
   extension developers implement `PropertyReflection` and PHPStan wraps it into
   the extended form — so the double avoids the version-split surface. Final
   verification + CI (incl. `prefer-lowest`) confirm it compiles across the matrix.

## Findings

- **Implemented via a subprocess test, not `AbstractRectorTestCase`** (deviation
  from the spec's original test shape, within its sanctioned fallback). The test
  harness cannot load a `phpstanConfig()` extension (per Resolved Q1), so
  `FirstPartyFlagArgumentToNamedRectorPropertyReceiverTest` drives the real CLI in
  a child process. This also makes it full-suite-safe by construction: the
  extension is loaded only into child processes, never the shared test container,
  so there is no cross-test leak to guard against.
- **One synthetic extension covers all receiver edges.** `MagicPropertyExtension`
  maps `Registry` dynamic properties to: a single first-party class (`tokens` →
  `TokenStore`, convert), a nullable first-party type (`nullableTokens`, convert),
  a vendor class (`client` → `ExternalClient`, skip), and a 2-class union
  (`ambiguous`, skip). The without-extension contrast reuses the existing
  `configured_rule.php`. Five cases, 16 assertions.
- **Codex adversarial review (pre-implementation).** Two warranted findings, both
  folded in: the same-process proof-by-contrast was invalid (now subprocess), and
  the README must not conflate native docblock `@property` (already handled) with
  extension-only dynamic properties (the gap).

<!-- Notes added during implementation. Do not remove this section. -->
