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
