## Project Conventions

```yaml
schema-version: 1
github:
  owner: hihaho
  repo: rector-rules
  default_base_branch: main
testing:
  backend_framework: pest
  forbid:
    - dusk
codex:
  invocation_mode: plugin
spec:
  filename_pattern: 'specs/{slug}.md'
fixtures:
  anonymization:
    guideline: .ai/guidelines/anonymize-public-examples.md
    scope:
      - tests/
      - src/
      - docs/
      - README.md
      - specs/
    forbidden_terms:
      - Video
      - videos
      - caliper
      - adaptive
```

# Anonymize Fixtures, Docs, and Specs

This is a **public, open-source repository**. Test fixtures, the rule
`CodeSample` heredocs in `src/`, the snippets in `README.md` / `docs/`, and the
spec files in `specs/` are all world-readable on GitHub — and `src/` plus the
README also ship in the Composer dist archive. `/tests` is `export-ignore`d, but
that only trims the archive; it hides nothing on GitHub. Doc examples and specs
are the easy things to forget precisely because they are not "fixtures" — they
leak just the same.

Every example — fixture, `CodeSample`, doc snippet, or spec — must be
**synthetic**. Never copy proprietary application code — from hihaho or any
consumer/dogfooding codebase — into one. Reconstruct the smallest generic
example that demonstrates the rule, then strip every domain detail not needed
to make the point.

This keeps internal domain models, naming, business terms, and logic out of a
public artifact, and it makes for better examples: the transformation stands
out instead of being buried in incidental domain noise.

## Anonymize these

- **Class and namespace names** — use framework-conventional placeholders
  (`App\Models\Article`, `App\Http\Resources\PostResource`). Don't reach for
  the product's real domain entities.
- **Variable, property, and method names** that carry domain meaning.
- **String literals** — route paths, table and column names, config keys,
  labels, messages. Invent neutral values; never paste a real schema column
  or route key.
- **Business terminology and comments** lifted from real code.
- **Logic and control flow** that mirrors a real implementation.

## Keep these — they are not leaks

- **Framework and vendor public symbols** (`Illuminate\…`, `Route`,
  `Blueprint`, `JsonResource`, `Model`). The rule usually has to match these
  to fire, and they are public API.
- **Generic example nouns** — `User`, `Post`, `Order`, `Article`, `Comment`.
- **The convention the rule enforces** (suffixes, alias targets, flag-column
  names). That is the package's public contract, not proprietary.

## Specs leak provenance, not just code

A spec in `specs/` rarely contains a real schema column — its leak vector is
**provenance metadata** describing where the work came from. Scrub all of it:

- **Internal PR / issue / ticket numbers** ("modelled on PR #1234",
  "ABC-123"). Describe the *change* generically ("a manual code-style cleanup")
  instead of citing the source. (Don't reference a real PR number here either —
  these examples are deliberately fake.)
- **Employee names, handles, and authorship** of the originating work.
- **Real domain method / class names** copied from the source change, even in
  prose (e.g. "the source change's `recalculateScore()`/`markProcessed()`
  calls"). Use the same neutral placeholders the spec's code examples use.
- **Dogfooding / consumer-app references** ("from the hihaho app", file/line
  counts of a private PR).

State *what* the rule does and *why*, never *which internal change or person*
it came from.

## Rule of thumb

An example should read like a generic framework tutorial snippet, not like a
slice of one company's application. If a reader could tell which product it
came from, anonymize further — prefer a neutral noun (`Article`, `Order`) over
an actual product entity (e.g. `Video`, `caliper`, `adaptiveLearning`).

## When adding or editing a fixture, doc example, or spec

1. Keep only the framework symbols the rule matches against.
2. Replace real names and strings with neutral equivalents.
3. For a fixture, run the test to confirm the rule still fires
   (`vendor/bin/pest path/to/RuleTest.php`); for a `CodeSample` or README
   snippet, keep it consistent with the rule it documents; for a spec, strip
   provenance (see "Specs leak provenance" above).
4. Before committing, scan the diff for product names, real table/column
   names, domain jargon, and internal PR/ticket/person references — across
   `specs/`, `README.md`, and `docs/` too, not only `tests/` and `src/`.

---

## Performance benchmarks

Every rule under `src/Rector/` runs **per-AST-node** during Rector traversal, so
the hot path is the rule pipeline itself — the `refactor()` / `getNodeTypes()`
gates and the shared `Concerns/` helpers (e.g. `ChecksRouteContext`). The
`rector-rule-authoring` guideline's "Gate cheaply, resolve names once" section
is the per-rule cost model; this file covers how to *measure* it.

Performance work goes through the **autoresearch** loop, not a Pest group — a
timed assertion in the suite is flaky and tells you nothing about the
distribution. Benchmark scripts live in `autoresearch/` (create the dir on first
use) and run this package's rules against a synthetic consumer corpus, measuring
wall-clock via `hrtime()`. Keep the corpus synthetic per
`anonymize-public-examples.md` — never benchmark against real consumer code.

Benchmark when touching the rule pipeline or a shared `Concerns/` helper:
capture a baseline, make one change, re-run, and keep it only if the metric
improves. The `autoresearch` skill drives the full measure → change →
keep-or-revert loop — activate it for any sustained optimization work.

---

## Public API discipline

Downstream consumers depend on this package via Composer, so every public
symbol is governed by SemVer 2.0 — renames or signature changes require a MAJOR
bump. The public surface of a Rector-rules package is narrower than a typical
library; it is exactly:

- **Rector rule class FQNs** under `Hihaho\RectorRules\Rector\` — consumers
  reference these by name in their own `rector.php`.
- **`HihahoSetList` constants** (`src/Set/HihahoSetList.php`) — the set-file
  paths consumers `->withSets([...])` against.
- **Set config files** under `config/sets/` — the rule groupings a set list
  constant resolves to. Adding a rule to a set is a minor; removing one (or
  changing what a set means) is breaking.
- **Public configuration constants / setters** on a configurable rule — the
  knobs a consumer passes through `->withConfiguredRule()`.

A rule's `refactor()` logic, its private helpers, and the `Concerns/` traits are
**not** public API. They may change in any release; a consumer extending or
calling them does so against the documentation.

### Default new helpers to internal

This package has no `Internal\` namespace yet. Until one exists, keep
implementation detail out of the four public categories above:

- Shared logic between rules → a trait under the rule's `Concerns/` subdir
  (the established pattern, e.g. `Routing/Concerns/ChecksRouteContext`). These
  traits are implementation detail, not public API, regardless of whether they
  carry an `@internal` tag.
- A new rule you are not ready to commit to → do not add it to any
  `config/sets/` file. An un-setted rule class is reachable by FQN but not part
  of any set's contract, so it carries weaker guarantees.

Promoting an internal helper to public later is a non-event. Demoting a public
symbol back to internal requires a deprecation cycle and a MAJOR bump. That
asymmetry makes "internal until proven otherwise" the safe default.

### When deleting or renaming a public symbol

Direct removal is a MAJOR-bump-only event. For pre-MAJOR releases, add a
deprecation cycle instead:

- **Classes** — keep the old FQN as a `class_alias` to the new one.
- **Methods / constants** — keep the old name with an `@deprecated` PHPDoc tag
  pointing at the replacement.
- **Set membership** — if a set drops a rule, note it; consumers pinning that
  set will silently lose the transform otherwise.
- **Document the timeline in the release notes** under a "Deprecations"
  heading (drafted in `internal/release-notes-<version>.md` per the CLAUDE.md
  Release Automation section) so consumers see when the shim disappears.

### When in doubt

Default to internal. A rule that isn't in a set and a helper under `Concerns/`
both cost nothing to promote later; a public symbol costs a deprecation cycle to
retract.

---

# Authoring Rector Rules

Repo-specific conventions and gotchas for adding a rule under `src/Rector/`.
For the general mechanics of building a rule, follow the vendor
`rector-developer` skill — this guideline only covers what bites in *this*
package.

## Gate cheaply, resolve names once

The per-node bottleneck is the name-resolver machinery, not your refactor
logic. `refactor()` runs on every matching node in the consumer's codebase, so:

- Gate with a direct `instanceof` check on the node's `name` / `class` first
  (`$node->name instanceof Identifier`, `$node->class instanceof Name`). This
  bails the overwhelming majority of nodes before any name resolution.
- Then resolve the name **once** (`$this->getName($node)`) and compare —
  never loop `isName()` / `isNames()` across accepted spellings.
- PHP function, class, **and method** names are all case-insensitive, so match
  with `strtolower()` / `strcasecmp()` rather than an exact `toString()`
  comparison — a `MethodCall` / `StaticCall` rule that compares the method name
  exactly silently skips valid mixed-case calls (e.g. `Route::GET()`).

`ChecksRouteContext` is the canonical shape.

## `provideMinPhpVersion()`: use `PhpVersion::PHP_*`, not a new `PhpVersionFeature::*`

`PhpVersionFeature` feature aliases can be **newer than the `rector/rector`
floor** in `composer.json` (`^2.4.1`). `PhpVersionFeature::NAMED_ARGUMENTS`, for
instance, does not exist in the floor and throws `Undefined constant` on the CI
`prefer-lowest` leg — green locally (latest Rector), red in CI.

Return a stable `Rector\ValueObject\PhpVersion::PHP_8X` constant instead (e.g.
`PhpVersion::PHP_80` for a PHP-8.0 feature), unless you have confirmed the
feature alias exists in the floor. The `PhpVersion::PHP_*` values are long-stable.

## Test-double `Source/` classes must be Rector-clean

`rector.php` processes `tests/`, and a CI **Auto-fix** workflow runs
`vendor/bin/rector process` on every push to `main` and commits the result as
`chore: auto-fix` directly on the branch.

So a reflection test double — a `tests/.../Source/*.php` class whose method
signatures exist only so a rule can resolve parameter names — gets mangled on
push: the deadcode set strips "unused" parameters
(`RemoveUnusedPublicMethodParameterRector`) and deletes empty-body methods
(`RemoveEmptyClassMethodRector`), breaking the fixtures that depend on those
signatures.

Give every `Source` method a body that genuinely uses all its parameters, and
avoid empty bodies. Confirm `vendor/bin/rector process --dry-run` reports
**0 changes before pushing** — otherwise the auto-fix bot rewrites the double
on push and reds the test legs.

---

## Fixing PHPStan Errors

When fixing a PHPStan error, first decide whether it represents a runtime bug a test could catch — and if so, write that test before the fix.

### Process

1. **Assess testability** — does the error represent a runtime bug a test could reproduce (a wrong argument type, a missing method, an incorrect return type used downstream)?
2. **Write the test first** — if a test can catch it, write a failing test that reproduces the error before applying the fix.
3. **Fix the code** — apply the fix so both the PHPStan error and the new test pass.
4. **Verify both** — confirm PHPStan reports no error and the test passes.

### When to Write a Test

Write a test when the PHPStan error indicates a fault that would surface at runtime:

- A method call on a value of the wrong type
- Missing or incorrect arguments to a function or method
- A return-type mismatch that would break callers
- Accessing a property or method that does not exist
- Any type error that would manifest as a runtime exception

### When to Skip the Test

Skip the test when the error is purely static and cannot cause a runtime failure:

- Missing return-type declarations
- PHPDoc mismatches with no runtime impact
- Unused variables or imports
- Generic-type parameter issues

---

## Signed Commits

Applies **only when the repository has commit signing enabled** (e.g. `git config commit.gpgsign` is `true`, or a `user.signingkey` / `gpg.format` is set). If signing is not enabled, this guideline does not apply — commit normally.

### Never fall back to an unsigned commit

When signing is enabled, every commit must be signed. If the signing backend or agent (1Password, `gpg-agent`, `ssh-agent`, a hardware key, etc.) is unavailable, locked, or not responding:

- **Stop and surface the failure** to the user with the exact error.
- **Do not** retry with `--no-gpg-sign`, unset `commit.gpgsign`, or otherwise produce an unsigned commit to "get past" the problem.

A missing signature is a blocker to resolve (unlock the agent, re-authenticate 1Password, plug in the key), not a step to skip. Let the user fix the signing setup, then commit signed.

---

## Verification Before Completion

Before claiming any work is complete or successful, run the verification command fresh and confirm the output. Evidence before claims, always.

### Required Before Any Completion Claim

1. **Run** the relevant command (in the current message, not from memory)
2. **Read** the full output
3. **Confirm** it supports the claim
4. **Then** state the result with evidence

| Claim            | Required verification                                            |
|------------------|------------------------------------------------------------------|
| Tests pass       | The project's test command, output showing 0 failures            |
| Code style clean | The project's formatter/style checker, output showing no changes |
| Linting clean    | The project's linter, output showing 0 errors                    |
| Types check      | The project's type checker, output showing 0 errors              |
| Bug fixed        | The previously failing test now passes                           |
| Feature complete | All related tests pass                                           |

Use the project's own commands — check its `composer.json` / `package.json` scripts, CI config, or sibling docs to find them. Do not assume a specific tool.

### Delegating the checks

Where the project has dedicated quality-check skills synced, delegate to them — `backend-quality` for backend files, `frontend-quality` for frontend files, both when a change spans both. Otherwise, run the project's own equivalent commands directly.

### Never Use Without Evidence

- "should work now"
- "that should fix it"
- "looks correct"
- "I'm confident this works"

These phrases indicate missing verification. Run the command first, then report what actually happened.

---

# Laravel Package Guidelines

These guidelines supplement the framework-agnostic Package Boost
Guidelines (`foundation.md`) for Composer packages that target
Laravel. A consumer receives both files, composed — read this one
together with `foundation.md`, not instead of it.

Apply this file only when `composer.json` declares a Laravel
dependency — a `require.illuminate/*` entry or
`require.laravel/framework`. A framework-agnostic package ignores
everything below.

## Laravel Context

A Laravel package has no host application of its own. A Laravel
kernel is booted only at test time, by Orchestra Testbench. The base
test case is `Orchestra\Testbench\TestCase`.

- `composer.json`'s `require.illuminate/*` (or
  `require.laravel/framework`) defines the supported Laravel range.
  Check it before using a version-specific framework API.
- The service provider is the package's entry point into a host
  app. One per package, named `{PackageStudly}ServiceProvider`,
  registered under `extra.laravel.providers` for package discovery.
- Test fixtures — migrations, routes, views, factories — live under
  `workbench/`, not `tests/`. Testbench's conventions place them
  there; follow them.

## Use `vendor/bin/testbench`, not `php artisan`

Running artisan directly against the package fails — there is no
host application. Use Testbench's binary, which boots a kernel
first:

| Instead of | Use |
|---|---|
| `php artisan test` | `vendor/bin/pest` or `vendor/bin/phpunit` |
| `php artisan tinker` | `vendor/bin/testbench tinker` |
| `php artisan make:*` | Create files manually under `src/` |
| `php artisan vendor:publish` | `vendor/bin/testbench vendor:publish` |

Register the package's service provider in `testbench.yaml` under
`providers:` so Testbench boots it. Published files land in
`workbench/` by default, not the `config/` or `resources/` of a
host app.

### Commands that require `laravel/boost`

These apply only when the package has `laravel/boost` as a dev
dependency. Skip them if Boost is not installed — `boost sync`
prints a warning and moves on.

| Instead of | Use |
|---|---|
| `php artisan boost:install` | `vendor/bin/testbench boost:install` |
| `php artisan boost:mcp` | `vendor/bin/testbench boost:mcp` |

## Cross-Version Compatibility

Supporting multiple Laravel and PHP majors in one release is routine
for a Laravel package. Constraints use `||` between major ranges
(`^12.0||^13.0`), and CI runs a matrix that includes `prefer-lowest`
so the declared floor is actually exercised.

- Activate the `cross-version-laravel-support` skill **before**
  writing version-spanning code.
- Activate the `ci-matrix-troubleshooting` skill **after** a matrix
  cell has failed.
- See the `package-development` skill for the Testbench and
  `workbench/` layout.

---

# Package Boost Guidelines

These guidelines replace Laravel Boost's default foundation for
repositories that ship as Composer packages — Laravel-targeted or
framework-agnostic. The framing, tooling, and trade-offs differ from
application development; follow this version when working inside a
package codebase.

## Foundational Context

This codebase is a **Composer package**, not an application. The rules
below hold regardless of which framework (if any) the package targets.

- There is no `app/`, `bootstrap/`, `routes/`, `.env`, or database by
  default. Tooling that assumes an application context (e.g. running
  `php artisan` against the package itself) does not apply.
- The primary artefact is the package's public API — entry-point
  classes, service providers, exposed contracts. Everything else is
  scaffolding.
- Downstream consumers depend on this package via Composer. Every
  public change is a user-facing API change governed by semver.
- `composer.json` is the source of truth for supported PHP versions
  and any framework constraints. Check `require.php` (and any
  `require.<framework>/*` entries) before using version-specific
  features.

## Source Layout

- `src/` — package source, PSR-4 autoloaded per `composer.json`
- `tests/` — Pest or PHPUnit suite
- `config/` — publishable defaults shipped with the package, when
  applicable
- `resources/` — views, translations, Boost skills / guidelines, when
  applicable
- `database/migrations`, `database/factories` — only if the package
  ships them
- `workbench/` — developer-only Testbench scaffolding when Testbench
  is in use; never shipped

Check sibling files before inventing structure. Do not introduce new
top-level directories without a clear reason.

## Tests Are the Specification

The package has no running application to click through. Tests are how
behaviour is pinned down.

- Write tests alongside any behavioural change.
- Do not create "verification scripts" when a test can prove the same
  thing.
- Run the project's configured test runner (`vendor/bin/pest` or
  `vendor/bin/phpunit`) before claiming a change is done.

## Public API Discipline

- Every `public`, `protected`, or exported symbol is part of the
  package's surface. Breaking changes require a major version bump.
- Prefer `final` classes and `private`/`@internal` markers for
  anything not intended for extension.
- Keep config keys, published asset paths, and service container
  bindings stable across patch and minor versions.

## Conventions

- Match existing code style, naming, and structural patterns — check
  sibling files before writing new ones.
- Use descriptive names (`resolvePublishDestination`, not `resolve()`).
- Reuse existing helpers before adding new ones.
- Do not add dependencies without approval; every new `require` is a
  constraint downstream consumers inherit.

## Extending boost-core

If your package authors a custom `FileEmitter` (to write a file like
`.mcp.json` into the host during `boost sync`), declare the
`boost-extension` tag in your `boost.php` `withTags([...])`. That pulls
the `writing-file-emitter` skill — gated off by default so consumers
who do not extend the engine don't carry it, which is why an
emitter-authoring package has to opt in explicitly. The same tag pulls
`skill-authoring` for writing boost-family skills.

## Documentation Files

Only create or edit documentation (README, CHANGELOG, docs/) when
explicitly requested or when a behaviour change requires it.

## Replies

Be concise. Focus on what changed and why. Skip restating what the
diff already shows.

---

# Release Automation

Conventions the package-boost family shares for release flow. The
procedural detail lives in the `pre-release` and `release-notes`
skills — loaded on-demand, not pinned here.

## CHANGELOG is CI-managed

`.github/workflows/update-changelog.yml` prepends the release body to
`CHANGELOG.md` on `release: released` and commits to the release's
target branch (typically `main`). Don't hand-edit `CHANGELOG.md` as
part of a release. Post-release typo fixes are committed directly.

## Release notes live in `internal/release-notes-<version>.md`

`internal/` is gitignored — drafts stay local. The notes file becomes
the release body. The first line pins the green commit so the pre-tag
gate can fail closed on drift:

```
<!-- verified-sha: <full sha> -->
```

## Tag and title

- Tag: bare version (`0.7.0`) — Composer and Packagist read the tag.
- Release title: `v`-prefixed (`v0.7.0`) — cosmetic.
- Notes file: bare (`internal/release-notes-0.7.0.md`).

## Agent handoff

Agents stop at the ready-to-tag handoff. The user runs the pre-tag
gate and publishes the release (GitHub UI, `gh`, or otherwise). See
the `pre-release` skill for the full procedure and the no-release-create
rule.
