# Anonymize Fixtures and Doc Examples

This is a **public, open-source repository**. Test fixtures, the rule
`CodeSample` heredocs in `src/`, and the snippets in `README.md` / `docs/` are
all world-readable on GitHub — and `src/` plus the README also ship in the
Composer dist archive. `/tests` is `export-ignore`d, but that only trims the
archive; it hides nothing on GitHub. Doc examples are the easy thing to forget
precisely because they are not "fixtures" — they leak just the same.

Every example — fixture, `CodeSample`, or doc snippet — must be **synthetic**.
Never copy proprietary application code — from hihaho or any
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

## Rule of thumb

An example should read like a generic framework tutorial snippet, not like a
slice of one company's application. If a reader could tell which product it
came from, anonymize further — prefer a neutral noun (`Article`, `Order`) over
an actual product entity (e.g. `Video`, `caliper`, `adaptiveLearning`).

## When adding or editing a fixture or doc example

1. Keep only the framework symbols the rule matches against.
2. Replace real names and strings with neutral equivalents.
3. For a fixture, run the test to confirm the rule still fires
   (`vendor/bin/pest path/to/RuleTest.php`); for a `CodeSample` or README
   snippet, keep it consistent with the rule it documents.
4. Before committing, scan the diff for product names, real table/column
   names, and domain jargon — across `README.md` and `docs/` too, not only
   `tests/` and `src/`.
