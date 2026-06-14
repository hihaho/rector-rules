# Middleware String to Class-Fluent Rector Rule

## Overview

A new opt-in Rector rule, `MiddlewareStringToClassRector`, that rewrites
string-based route middleware references (`->middleware('auth:sanctum')`,
`Route::middleware(['can:update,post'])`) into Laravel's class-based fluent form
(`Authenticate::using('sanctum')`, `Authorize::using('update', 'post')`). The
fluent helpers return the same resolver string the magic string would produce,
so the change is behaviour-preserving while making middleware references
refactor-safe, navigable, and statically checkable. The rule is **not in any
set** — it enforces an optional, undocumented-by-Laravel convention, so it is
reachable by FQN only.

## Assumptions

- **Bare no-param aliases are converted by default** (`'auth'`→`Authenticate::class`,
  `'verified'`→`EnsureEmailIsVerified::class`). User-confirmed. `convert_bare_aliases`
  defaults `true`; set `false` to convert only the `alias:param` forms. Group names
  (`'web'`, `'api'`) are never aliases and are always left alone.
- **`withoutMiddleware()` is in scope** alongside `middleware()` (Phase 1).
  User-confirmed — the emitted string matches the applied middleware, so removal
  still matches.
- **Not added to any set** — reachable by FQN only. User-confirmed; matches the
  opinionated-rule pattern.
- **Throttle is excluded from Phase 1 and gated opt-in in Phase 2**, because the
  throttle class is per-consumer and cannot be assumed — see §3. User asked to
  ground this in real consumer repos; the survey (Findings) shows the sampled
  consumers *disagree* (one non-Redis, one Redis, one default), which is the
  evidence for "never guess the throttle class."
- **Emitted class references are fully-qualified**, deferring `use`-import
  shortening to the consumer's Rector import config (standard convention) — not
  user-confirmed, low-risk; flagged here for sign-off.

---

## 1. The conversion mapping

Laravel 10.9.0 (PR #46362) added static "named middleware" helpers that return
`static::class.':'.$params`. Source of the alias→class map:
`vendor/laravel/framework/src/Illuminate/Foundation/Configuration/Middleware.php`
`::defaultAliases()` (line ~803). The package floor is Laravel 12, so every
supported consumer has the API.

The **safe whitelist** (Phase 1 — unambiguous, lossless):

| String form | Class-fluent form | Helper signature |
|---|---|---|
| `'auth:guard[,guard2…]'` | `Authenticate::using('guard'[, 'guard2'])` | `using($guard, ...$others)` |
| `'auth.basic:guard[,field]'` | `AuthenticateWithBasicAuth::using('guard'[, 'field'])` | `using($guard = null, $field = null)` |
| `'can:ability[,model…]'` | `Authorize::using('ability'[, 'model'])` | `using($ability, ...$models)` — **args stay strings** |
| `'guest:guard[,…]'` | `RedirectIfAuthenticated::using('guard')` | `using($guard, ...$others)` |
| `'password.confirm:route[,seconds]'` | `RequirePassword::using('route'[, 3600])` | `using($redirectToRoute = null, $passwordTimeoutSeconds = null)` |
| `'signed'` | `ValidateSignature::class` | (default = absolute, no ignores) |
| `'signed:relative'` | `ValidateSignature::relative()` | `relative($ignore = [])` |
| `'verified'` | `EnsureEmailIsVerified::class` | — |
| `'verified:route'` | `EnsureEmailIsVerified::redirectTo('route')` | `redirectTo($route)` — **not** `using()` |

`throttle` is handled separately (§3). `cache.headers` (`SetCacheHeaders::using`,
array/string options), `auth.session`, and `precognitive` (no helpers) are out of
scope.

**Hard rules baked into the mapping:**

- `can:`'s 2nd+ args (`'post'`) are **kept as string literals** — never upgraded
  to `Post::class`; the original is usually a route-parameter name, and changing
  it alters the authorisation target.
- `signed` uses `relative()`/`absolute()`, `verified` uses `redirectTo()` — a
  blanket "always `using()`" mapping is wrong for both.
- A param the helper can't round-trip (contains `:` or `,`, or is an enum value)
  → leave the string untouched.

## 2. AST surface and gating

Phase 1 targets the two dominant shapes, reusing/extending
`src/Rector/Routing/Concerns/ChecksRouteContext`:

- `MethodCall` named `middleware` / `withoutMiddleware` (case-insensitive) on a
  receiver that resolves to an Illuminate routing type (`Route` facade, `Router`,
  `Illuminate\Routing\Route`, `RouteRegistrar`, `PendingResourceRegistration`).
- `StaticCall` `Route::middleware(...)` / `Route::withoutMiddleware(...)` (the
  facade — already covered by `ChecksRouteContext::isRouteStaticCall`).

For each matched call, rewrite **string-literal** arguments and **string-literal
elements of an array-literal** argument. Skip variables, concatenations,
function calls, already-class-form args, group names (`'web'`, `'api'`), and any
alias not in the whitelist. An unresolvable receiver is skipped (conservative) —
no false-positive rewrite of an unrelated `->middleware()` method.

Out of scope for Phase 1 (candidate Phase 3): `bootstrap/app.php`
`->withMiddleware(fn ($m) => $m->group/append/prepend([...]))`, L10 controller
`$this->middleware('auth')`, L11 `HasMiddleware::middleware()` returning
`Middleware` value objects, and middleware attributes.

## 3. The throttle problem — can we infer the correct class?

**Research conclusion: the throttle class is NOT inferable from the call site,
and only weakly inferable cross-file. Default to excluding throttle; gate it
behind explicit config.**

The `'throttle'` alias resolves to `ThrottleRequestsWithRedis::class` iff the
app-global `$throttleWithRedis` flag is set, and to `ThrottleRequests::class`
otherwise (`Configuration/Middleware.php:815-817`). That flag is set by
`->throttleWithRedis()` (or `->throttleApi(redis: true)`) inside
`bootstrap/app.php`'s `withMiddleware()` callback — **global configuration that
is invisible at the `->middleware('throttle:…')` call site.**

Inference options evaluated:

| Approach | Verdict |
|---|---|
| **Call-site inference** | Impossible — the route definition carries no throttle-driver information. |
| **Runtime reflection** | Impossible — Rector does not boot the consumer's Laravel app, so the resolved alias can't be queried. |
| **Cross-file scan** of `getcwd().'/app/Http/Kernel.php'` (`'throttle' => …::class`, L10 style) and `getcwd().'/bootstrap/app.php'` (`->throttleWithRedis(`, L11+) | **Well-founded for real consumers** — the survey (Findings) shows sampled consumer apps each *declare* the throttle class there (some `ThrottleRequests::class`, some `ThrottleRequestsWithRedis::class`). `getcwd()` is the project root during `rector process`. Caveats remain: non-standard layouts, conditional enabling, multi-app repos — so it is a best-effort *default*, never the sole source of truth. Precedent-setting: no current rule reads project-root files. |
| **Explicit config** (consumer declares the class) | Robust, simple, reliable — the shipped contract. |

The real-consumer survey is decisive: the throttle class **varies per consumer**
(non-Redis, Redis, and unset across the sampled apps), so a fixed
default is wrong for someone. The class is therefore never guessed from the call
site; it is resolved from the consumer's own declaration or explicit config.

Decision: **throttle is excluded from the Phase 1 default whitelist.** A Phase 2
opt-in adds it. When `include_throttle` is on, the target class is resolved in
priority order:

1. Explicit `throttle_class` config, if set.
2. Best-effort scan of the consumer's `app/Http/Kernel.php` / `bootstrap/app.php`
   (the declarations above), cached once per run.
3. **Skip the throttle conversion** when neither resolves — never silently emit a
   possibly-wrong class.

With the class resolved, branch on the parameter shape (the second trap):

- `'throttle:api'` (non-numeric first param → named limiter) →
  `{throttle_class}::using('api')`.
- `'throttle:60,1'` (numeric `max,decay[,prefix]`) →
  `{throttle_class}::with(60, 1)` — emitted as **int** literals.

## 4. Configuration

| Key | Default | Purpose |
|---|---|---|
| `aliases` | the §1 safe whitelist | Which aliases to convert; lets a consumer narrow or extend. |
| `convert_bare_aliases` | `true` | Also rewrite no-param forms (`'auth'`→`Authenticate::class`). Set `false` to convert only `alias:param` forms. |
| `include_throttle` | `false` | Opt into throttle conversion (§3). |
| `throttle_class` | unset | Target class when `include_throttle` is on; overrides best-effort detection. Unset → detect, else skip throttle. |

## 5. Public API and set placement

- FQN: `Hihaho\RectorRules\Rector\Routing\MiddlewareStringToClassRector`.
- **Not added to any `config/sets/` file** — opinionated, undocumented-by-Laravel
  convention; matches the established opt-in pattern (`FlagColumnToBooleanRector`,
  `NamedArgumentFromManifestRector`).
- Emitted class references use the fully-qualified name; rely on the consumer's
  Rector import configuration to shorten + add `use` statements (the standard
  Rector convention — do not hand-roll import insertion).

## Edge Cases

| Scenario | Handling |
|----------|----------|
| `->middleware()` on a non-route receiver (unrelated class with a `middleware()` method) | Skipped — receiver-type gate (§2); covered by a skip fixture (Phase 1 Tests). |
| Array arg with mixed convertible + non-convertible elements (`['auth:sanctum', 'web', $dynamic]`) | Convert only the whitelisted string literals; leave `'web'` (group) and `$dynamic` (variable) untouched. Phase 1 Tests. |
| `'can:update,post'` where `post` is a route-param name | Both args kept as string literals — never converted to `::class`. Phase 1 Tests. |
| `'throttle:60,1'` vs `'throttle:api'` with throttle enabled | `with(60,1)` (int args) vs `using('api')` — numeric branch. Phase 2 Tests. |
| Redis throttle consumer | `throttle_class` config selects `ThrottleRequestsWithRedis`; default `ThrottleRequests` documented as the assumption (§3). Phase 2 Tests + README caveat. |
| `'signed'` / `'verified'` (no param) | `ValidateSignature::class` / `EnsureEmailIsVerified::class` by default (`convert_bare_aliases` true); left as string when set false. Phase 1 Tests (both settings). |
| Already class-form (`Authenticate::using('web')`) | No-op — only string literals are rewritten. Phase 1 Tests (skip fixture). |
| Unknown / custom alias (`'subscribed'`, app-defined) | Left untouched — not in whitelist. Phase 1 Tests (skip fixture). |
| Param containing `:` or `,` that can't round-trip | Left untouched. Phase 1 Tests (skip fixture). |
| `withoutMiddleware('auth:sanctum')` | Converted using the same mapping — the emitted string matches the applied one, so removal still matches. In scope (confirmed). Phase 1 Tests. |

## Implementation

> **Phases 1 & 2 shipped in earlier releases** (0.9.0; the auth/guest default-safety
> narrowing in 0.9.3). Their task boxes below are checked to reflect that. Phase 3 was
> the remaining LOW-priority work, now implemented.

### Phase 1: Safe-whitelist conversion (Priority: HIGH)

- [x] Create `src/Rector/Routing/MiddlewareStringToClassRector.php` — `AbstractRector` + `ConfigurableRectorInterface`, `getNodeTypes()` = `[MethodCall, StaticCall]`, reusing `ChecksRouteContext` for the `Route::` facade gate.
- [x] Implement receiver-type gate for `MethodCall` `middleware`/`withoutMiddleware` — resolve to Illuminate routing types; skip unresolved.
- [x] Build the alias→helper mapping table for the §1 whitelist (excluding throttle), with the `signed`/`verified`/`can` special cases and the round-trip-safety skips.
- [x] Rewrite string-literal args and string-literal array elements; leave everything else.
- [x] `configure()` — `aliases`, `convert_bare_aliases`; `getRuleDefinition()` with a `ConfiguredCodeSample`.
- [x] Tests — fixtures per whitelisted alias (param + bare under both `convert_bare_aliases` settings), array-arg mixed conversion, `can:` model-arg-stays-string, and skips: non-route receiver, unknown alias, already-class-form, unround-trippable param, group name.

### Phase 2: Throttle conversion (opt-in) (Priority: MEDIUM)

- [x] Add `include_throttle` + `throttle_class` config.
- [x] Implement the `using` (named) vs `with` (numeric) branch with int-literal emission for `with`.
- [x] README "Opt-in" subsection documenting the Redis caveat and `throttle_class`.
- [x] Tests — `throttle:api`→`using`, `throttle:60,1`→`with`, custom `throttle_class` (Redis), and throttle-left-untouched when `include_throttle` is off.

### Phase 3: Extended call surfaces (Priority: LOW)

- [x] `bootstrap/app.php` `->withMiddleware()` `group`/`append`/`prepend` arrays — the
      configurator gate (`Illuminate\Foundation\Configuration\Middleware`) with
      per-method arg selection (`group` rewrites arg 1, keeping the name; `append`/
      `prepend` rewrite arg 0).
- [x] L11 `HasMiddleware::middleware()` `Middleware` value objects — `New_` of
      `Illuminate\Routing\Controllers\Middleware`, arg 0. **L10 controller
      `$this->middleware()` was deliberately skipped**: it was removed in Laravel 11 and
      the package floor is Laravel 12, so it is dead surface for every supported version
      (see Findings).
- [~] Best-effort throttle-driver detection — **built, then removed** (see Findings).
      Regex-scanning `bootstrap/app.php` / `Kernel.php` from `getcwd()` proved
      irredeemably fragile (four adversarial review rounds, every one a real correctness
      or reliability finding: imported short-name aliases, positional redis flags, comment
      / unrelated-array false positives, working-directory dependence). Throttle
      conversion keeps the robust explicit `throttle_class` config — the original 0.9.x
      contract, and what the spec always named the reliable source of truth.
- [x] Tests — two fixtures for the new surfaces (`convert_middleware_configurator`,
      `convert_controller_middleware_value_object`) plus named-argument coverage
      (`convert_controller_middleware_named_args`,
      `convert_controller_middleware_positional_then_named`).

---

## Open Questions

None — the Assumptions Audit resolved all four (see `## Assumptions` and Resolved
Questions).

---

## Resolved Questions

1. **Bare no-param aliases — convert or skip?** **Decision:** Convert by default
   (`convert_bare_aliases` true). **Rationale:** Consumer choice; bare `'auth'`/
   `'signed'`/`'verified'` are common in the surveyed repos and benefit equally
   from navigability. Toggle off for minimal-diff consumers.
2. **`withoutMiddleware()` — in scope?** **Decision:** Yes, Phase 1.
   **Rationale:** The emitted string matches the applied middleware, so removal
   still resolves; symmetry is least-surprising.
3. **Set membership?** **Decision:** Not in any set; FQN-only opt-in.
   **Rationale:** Laravel doesn't document this form as recommended — opinionated,
   matches the established opt-in pattern.
4. **Throttle class — can it be inferred?** **Decision:** Not from the call site;
   resolve from explicit `throttle_class` config or a best-effort scan of the
   consumer's `Kernel.php`/`bootstrap.app.php`, else skip. Excluded from Phase 1.
   **Rationale:** The consumer survey (Findings) shows the throttle class varies
   per consumer, so no fixed default is safe.

## Findings

**Throttle-class inference — consumer survey (2026-06-14).** Surveyed real
consumer repos for grounding (patterns only; no proprietary code copied here):

- **The throttle class varies per consumer, declared in their own config:** one
  app aliases `'throttle' => ThrottleRequests::class` (non-Redis), another
  `'throttle' => ThrottleRequestsWithRedis::class` (Redis), a third leaves it
  unset (framework default). A fixed default would be wrong for at least one.
- **It is declared greppably** in `app/Http/Kernel.php` (`$middlewareAliases`) or
  `bootstrap/app.php` (`->throttleWithRedis()`), under `getcwd()` — so best-effort
  detection is viable as a Phase 2 *default*, with explicit `throttle_class` as
  the override and "skip if undetermined" as the floor.
- **Both throttle param shapes occur** — numeric (`throttle:60,1`, `throttle:5,1`)
  and named (`throttle:api`, `throttle:social-auth`) — so the `with`/`using`
  branch is load-bearing, not theoretical.

**Whitelist validation.** The §1 whitelist (`auth`, `auth.basic`, `can`, `guest`,
`password.confirm`, `signed`, `verified`) exactly matches the convertible aliases
seen in real `->middleware()` / array usage. Non-framework aliases observed
(`fortify.*`, `role:`/`permission:`/`role_or_permission:`, `saml`, `filament.*`)
have no fluent helpers and are correctly out of scope. Array-form middleware is
very common (route-group definitions), confirming array-element rewriting is
essential, not optional.

**Phase 3 implementation notes.**

- **L10 `$this->middleware()` skipped as dead surface.** It was removed in Laravel 11
  (replaced by `HasMiddleware`), and the package floor is Laravel 12 — so no supported
  consumer has it. Implementing it would add a controller-`$this` receiver gate that
  can never fire on a supported version.
- **Per-method arg selection.** Unlike `middleware()` (all args are middleware), the
  configurator methods place middleware in specific positions — `group($name, $mw)`
  keeps arg 0. `middlewareArgIndices()` returns the exact indices per sink so the group
  name is never rewritten.
- **Throttle auto-detection was built and then removed** after adversarial review. A
  regex scan of `bootstrap/app.php` / `app/Http/Kernel.php` (from `getcwd()`) cannot be
  made reliable: it can't resolve a `use`-imported short class name (would emit a broken
  `\CustomThrottle`), it matches a `'throttle' => …'` string sitting in a comment or an
  unrelated array (a wrong rewrite), and `getcwd()` is not the project root when Rector
  is launched from a subdirectory / editor / CI wrapper (silently converts nothing).
  Four review rounds each surfaced a fresh instance of this class of problem — the signal
  that source-level grepping is the wrong altitude for resolving runtime config.
  **Decision:** drop detection entirely; `throttle` conversion requires the explicit
  `throttle_class` config (robust, the original 0.9.x contract). The spec had already
  named explicit config "the shipped contract" and detection "best-effort, never the sole
  source of truth" — removal makes the floor the only path. Surfaces A (configurator) and
  B (controller value objects) survive review clean and ship.
- The surviving surfaces all route through the same `convertString()` core, so the
  auth/guest default exclusion and every round-trip-safety skip apply uniformly. Their
  single-`$middleware`-argument sinks resolve the argument name-aware (the `middleware`
  parameter is matched by name under PHP 8 named arguments, by position otherwise), so a
  `new Middleware(only: […], middleware: '…')` call is handled correctly.
