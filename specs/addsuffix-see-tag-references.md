# `@see` references and their imports survive an AddSuffix rename

## Overview

0.17.0 closed the rename-propagation defect: declarations, references, imports and the
declaring file all move together now, and an adoption run over a consuming application
came out green — `rector` idempotent, PHPStan clean at level max, the suite passing,
path-discovered Artisan commands still listed.

One class of reference is left behind. **`@see` and `{@see}` docblock tags are not
rewritten**, in any of their four forms, and when a renamed class is referenced *only*
from such a tag its `use` import is neither rewritten nor removed — leaving an import of
a class that no longer exists.

The release notes list "docblocks" among what gets rewritten. That is true of type tags
(`@param`, `@return`, `@var`) and false of `@see`, so the note reads as complete when it
is not.

**Nothing in a quality gate catches the residue.** A `use` naming a nonexistent class,
plus a `{@see}` naming it, is 0 errors under PHPStan at `level: max` with
`strictRules.allRules` and 100% type coverage (verified with a purpose-built probe file).
Same silent shape as the command-discovery loss 0.17.0 just fixed: the tree looks clean
and is not.

## Assumptions

<!-- Sign-off ledger. AI reading of the evidence; not confirmed with a maintainer. -->

- **The gap is `@see` specifically, not docblocks generally** (verified in isolation —
  see §2; type tags rewrite correctly in the same file, in the same run).
- **The dangling import follows from the tag gap** (inference, high confidence). The
  import survives `removeUnusedImports: true` because the docblock mention reads as a
  usage; it is not rewritten because the tag is not a type position. Both halves are
  observed; the causal link between them is not proven from the package's source.
- **Scope is `@see` handling.** The FQCN-expansion nit in §3 is noted, not argued for.

---

## 1. What the adoption run covered

A consuming application running 0.17.0 with all four suffix rules enabled and
`withImportNames(removeUnusedImports: true)`.

| Check | Result |
|---|---|
| `rector process` | declarations, file renames and reference rewrites all applied |
| File renames | correct, and `git status --find-renames` reports them as `R` |
| Second `rector` run | 0 changes — idempotent |
| PHPStan (level max, strict, 100% type coverage) | 0 errors |
| Test suite | green |
| `php artisan list` | every renamed command still discovered |
| Pint | reformatted about half the touched files (import ordering, see §3) |

The rules correctly skipped abstract base classes that already carried the suffix, and
correctly fired on nothing where the application had no matching classes.

## 2. The gap, isolated

A two-file probe under a config containing only `AddNotificationSuffixRector`:

```php
// probe/Notifications/ProbeThing.php
final class ProbeThing extends Notification {}
```

```php
// probe/Consumers/ProbeConsumer.php
use Probe\Notifications\ProbeThing;

/**
 * Inline tag: {@see ProbeThing} and {@see \Probe\Notifications\ProbeThing}.
 *
 * @see ProbeThing
 * @see \Probe\Notifications\ProbeThing
 */
final class ProbeConsumer
{
    /**
     * @param  ProbeThing  $short
     * @param  \Probe\Notifications\ProbeThing  $fq
     * @return ProbeThing
     */
    public function passThrough(ProbeThing $short, ProbeThing $fq): ProbeThing { /* … */ }
}
```

After:

| Position | Rewritten? |
|---|---|
| `use` import | ✅ |
| Native param / return type | ✅ |
| `new ProbeThing()` | ✅ |
| `@param`, `@return`, `@var` | ✅ (expanded to FQCN — §3) |
| `{@see ProbeThing}` | ❌ |
| `{@see \Probe\Notifications\ProbeThing}` | ❌ |
| `@see ProbeThing` | ❌ |
| `@see \Probe\Notifications\ProbeThing` | ❌ |

### The dangling import

In the probe the import survives correctly, because the class is also used in code. When
a class is referenced **only** from a `@see` tag, both halves fail at once. Reduced from
two instances observed in the adoption run:

```php
namespace App\Notifications;

use App\Notifications\OrderShipped;   // class no longer exists — it is now OrderShippedNotification

/**
 * Behaves the same way {@see OrderShipped} does, and for a stronger reason:
 * … and delivery follows the same path {@see OrderShipped}'s does.
 */
final class InvoicePaidNotification extends Notification
{
}
```

Harmless at runtime — PHP resolves imports lazily — but it is a broken import and two
dead documentation links per file, and no tool in the consumer's gate reports either.

### The gate does not see it

```php
namespace App\Probe;

use App\Notifications\ThisClassDoesNotExistAnywhere;

/** Refers to {@see ThisClassDoesNotExistAnywhere} only in prose. */
final class DanglingProbe
{
    public function noop(): void {}
}
```

`phpstan analyse` on that file, under the consumer's own `level: max` +
`strictRules.allRules` + `type_coverage: 100` config: **0 errors**.

## 3. Secondary observations

- **Type tags expand to FQCN.** `@param ProbeThing $short` becomes
  `@param \Probe\Notifications\ProbeThingNotification $short` even though the import
  exists and the native hint uses the short name. Correct, but noisy in a codebase that
  imports names, and it makes the rename diff larger than it needs to be.
- **Import ordering.** New imports are appended at the position of the old one rather
  than re-sorted, so Pint reformats 16 of the 31 touched files. Worth one line in the
  README next to the `withImportNames` note — an adopter running Rector in a CI dry-run
  gate without Pint afterwards will see the diff churn.
- **Prose references are untouched, as they should be.** The adoption run left a handful
  of backtick-quoted mentions of renamed classes in comments, migration docblocks, test
  comments and Markdown — including a Markdown file naming a path that no longer exists.
  Out of scope for a PHP rewriter, but adopters should budget a prose sweep — worth a
  README sentence, not a code change.
- **Queued notifications.** A renamed class that is `ShouldQueue` will fail to
  unserialize jobs already in flight when the rename deploys. Purely an adoption caveat;
  nothing the package can do.

## Edge Cases

| Scenario | Handling |
|---|---|
| `{@see Short}` inline tag | **Not rewritten** — §2 |
| `{@see \Fully\Qualified}` inline tag | **Not rewritten** — §2 |
| `@see Short` standalone tag | **Not rewritten** — §2 |
| `@see \Fully\Qualified` standalone tag | **Not rewritten** — §2 |
| Class referenced only from a `@see` tag | Import left dangling; nothing removes or rewrites it |
| Class referenced from `@see` **and** from code | Import rewritten correctly; tag still stale |
| `@see` naming a method (`{@see Foo::bar()}`) | **Untested** — likely the same gap, worth a fixture |
| `@link`, `@uses`, `@throws` naming a renamed class | **Untested** — `@throws` is a type position and may already work; the other two probably share the `@see` gap |

## Implementation

### Phase 1: Reproduce (Priority: HIGH)

- [x] Fixture: consumer with all four `@see` forms plus a type tag, asserting the type
  tag rewrites and the `@see` forms currently do not. This is the failing test.
- [x] Fixture: class referenced **only** from `{@see}`, asserting the import is left
  pointing at the old name.
- [x] Probe `@see Foo::bar()`, `@link` and `@uses` and record which share the gap.

### Phase 2: Rewrite `@see` (Priority: HIGH)

- [x] Extend whatever handles the type tags to cover `@see` / `{@see}`, short and
  fully-qualified. If `RenameClassRector` cannot reach inline tags, the suffix rules may
  need their own docblock pass.
- [x] Once tags rewrite, the dangling-import case should resolve on its own — verify with
  the Phase 1 fixture rather than assuming.

### Phase 3: Docs (Priority: MEDIUM)

- [x] Correct the release-note claim that "docblocks" are rewritten, or enumerate which
  tags are covered.
- [x] README: the Pint-after-Rector note, and the prose-sweep caveat.

## Open Questions

- **Q1.** Should type tags keep the short imported name instead of expanding to FQCN?
  Larger than this defect, and possibly `RenameClassRector`'s behaviour rather than the
  package's — worth confirming before treating it as a bug.
  → **Confirmed as Rector's behaviour, left alone.** `ClassRenamePhpDocNodeVisitor`
  rewrites an `IdentifierTypeNode` through `StaticTypeMapper`, which emits the FQCN. Not
  this package's to change. The new `@see` pass matches it where a tag depends on an
  import, and keeps the short name where the class is in the file's own namespace.
- **Q2.** Is there a supported hook for rewriting inline docblock tags, or does this need
  a hand-rolled pass over the docblock text?
  → **Answered: no hook; a hand-rolled pass was needed.**
  `ClassRenamePhpDocNodeVisitor::enterNode()` returns early for anything that is not an
  `IdentifierTypeNode`, so free-text tags are unreachable through Rector's docblock
  machinery. `RenameDocBlockSeeTagRector` + `DocBlockSeeTagRenamer` do it directly.

## Findings

### F1. Phase 1 probes — `@link` and `@uses` share the gap, and so does `::member`

The first fixture confirmed the spec's four `@see` forms and answered the two "untested"
edge-case rows in one go: `@link`, `@uses` and `@see Foo::bar()` are all left stale by
the same mechanism. Type tags in the same docblock rewrote correctly in the same run, so
the gap really is tag-specific rather than docblock-wide.

### F2. Q2 answered from the source: no hook exists

`DocBlockClassRenamer` drives `ClassRenamePhpDocNodeVisitor`, whose `enterNode()` bails
immediately unless the node is an `IdentifierTypeNode` — a *type* position. `@see` and
friends are parsed as opaque text, so no configuration of Rector's docblock renamer can
reach them. Hence a dedicated pass: `RenameDocBlockSeeTagRector` reads the same rename
collector the suffix rules populate, and `DocBlockSeeTagRenamer` does the text rewrite.
The rule is registered from the package's `config/config.php` alongside
`RenameClassRector`, so it needs no consumer configuration and is not part of any set.

### F3. The dangling import does **not** resolve on its own

Phase 2 said to verify rather than assume — correct call. With the tags rewritten, the
import was still left naming the old class, because `RenameClassRector` only rewrites an
import it also sees used somewhere in the AST, and a docblock-only reference gives it
nothing to see.

Two things fix it together:

- **A short reference that only resolved through an import is rewritten fully qualified.**
  The tag then stands on its own instead of depending on an import that may be dropped as
  unused. A short reference resolved within the file's own namespace stays short.
- **The rule rewrites the import itself**, but only once the old short name has gone from
  the rest of the file.

### F4. Rewriting the import eagerly broke type-tag rewriting

The first attempt rewrote any import naming a renamed class, immediately. That regressed
an existing test: `@var OrderShipped|null` stopped being rewritten. Rewriting the import
in the same pass pulls it out from under Rector's docblock renamer, which then cannot
resolve the short name in the type tag any more.

Hence the gate in `shortNameIsStillUsed()`: the import is only rewritten once the short
name appears nowhere else in the file outside its `use` line. Rector's per-file
fixed-point loop supplies the later pass in which that becomes true. The check is
deliberately crude — a false positive only defers the rewrite by an iteration, while a
false negative would break a live reference.

### F5. Explicit aliases are left alone

`use App\Notifications\OrderShipped as Legacy;` keeps its alias when the import is
rewritten, so `{@see Legacy}` is already correct and must not be touched. The resolver
reports whether a match came through an explicit `as` alias and skips those.

### F6. Ambiguous short names are never guessed

When a short name matches two renamed classes and neither the namespace nor an import
disambiguates, the reference is left alone rather than rewritten to one of them.

### F7. Scope note

`@throws` was listed as possibly already working. It is a type position, so Rector's own
renamer covers it, and it is deliberately not handled here.
