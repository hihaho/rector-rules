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
